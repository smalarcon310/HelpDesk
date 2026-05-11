<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return match ($user->role) {
            'admin' => $this->admin(),
            'tecnico' => $this->tecnico(),
            default => $this->usuario(),
        };
    }

    protected function admin()
    {
        $total = Ticket::count();
        $byStatus = Ticket::selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');
        $byTecnico = Ticket::whereNotNull('tecnico_id')->with('tecnico')->selectRaw('tecnico_id, count(*) as total')->groupBy('tecnico_id')->get();

        return view('dashboard.admin', compact('total', 'byStatus', 'byTecnico'));
    }

    protected function tecnico()
    {
        $user = Auth::user();
        $assigned = Ticket::where('tecnico_id', $user->id)->count();
        $byStatus = Ticket::where('tecnico_id', $user->id)->selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');
        $tickets = Ticket::where('tecnico_id', $user->id)->latest()->get();

        return view('dashboard.tecnico', compact('assigned', 'byStatus', 'tickets'));
    }

    protected function usuario()
    {
        $user = Auth::user();
        $myTickets = Ticket::where('user_id', $user->id)
            ->with([
                'tecnico:id,name',
                'comments' => function ($query) {
                    $query->latest();
                },
            ])
            ->latest()
            ->get();
        $byStatus = Ticket::where('user_id', $user->id)->selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

        return view('dashboard.usuario', compact('myTickets', 'byStatus'));
    }
}
