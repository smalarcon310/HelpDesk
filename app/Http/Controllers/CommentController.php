<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        Gate::authorize('view', $ticket);

        $data = $request->validate(['body' => ['required', 'string']]);
        Comment::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'body' => $data['body'],
        ]);

        return back()->with('success', 'Comentario agregado.');
    }
}
