<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Ticket::with(['user', 'tecnico'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($user->role === 'usuario') {
            $query->where('user_id', $user->id);
        }

        if ($user->role === 'tecnico') {
            $query->where('tecnico_id', $user->id);
        }

        $tickets = $query->paginate(10);

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'in:hardware,software,red,mantenimiento,otro'],
            'priority' => ['required', 'in:alta,media,baja'],
        ]);

        $data['user_id'] = Auth::id();
        $ticket = Ticket::create($data);

        return redirect()->route('tickets.show', $ticket)->with('success', 'Ticket creado correctamente.');
    }

    public function show(Ticket $ticket)
    {
        Gate::authorize('view', $ticket);
        $ticket->load(['user', 'tecnico', 'comments.user', 'histories.user']);

        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        Gate::authorize('update', $ticket);
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        Gate::authorize('update', $ticket);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'in:hardware,software,red,mantenimiento,otro'],
            'priority' => ['required', 'in:alta,media,baja'],
        ]);

        $ticket->update($data);

        return redirect()->route('tickets.show', $ticket)->with('success', 'Ticket actualizado.');
    }

    public function destroy(Ticket $ticket)
    {
        abort_unless(Auth::user()->role === 'admin', 403);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket eliminado.');
    }

    public function assign(Request $request, Ticket $ticket)
    {
        abort_unless(Auth::user()->role === 'admin', 403);
        $data = $request->validate(['tecnico_id' => ['nullable', 'exists:users,id']]);
        $ticket->update(['tecnico_id' => $data['tecnico_id'] ?? null]);

        return back()->with('success', 'Técnico asignado.');
    }

    public function changeStatus(Request $request, Ticket $ticket)
    {
        $allowed = Auth::user()->role === 'admin' || (Auth::user()->role === 'tecnico' && $ticket->tecnico_id === Auth::id());
        abort_unless($allowed, 403);

        $data = $request->validate(['status' => ['required', 'in:pendiente,en_proceso,resuelto,cerrado']]);
        $ticket->update($data);

        return back()->with('success', 'Estado actualizado.');
    }
}
