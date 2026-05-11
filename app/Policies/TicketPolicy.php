<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;

class TicketPolicy
{
    /** Determine whether the user can view the ticket. */
    public function view(User $user, Ticket $ticket)
    {
        return $user->role === 'admin' || $ticket->user_id === $user->id || $ticket->tecnico_id === $user->id;
    }

    /** Determine whether the user can update the ticket. */
    public function update(User $user, Ticket $ticket)
    {
        return $user->role === 'admin' || $ticket->user_id === $user->id;
    }

    /** Only admin can assign a technician */
    public function assign(User $user, Ticket $ticket)
    {
        return $user->role === 'admin';
    }

    /** Technicians can change status on assigned tickets; admins can change any */
    public function changeStatus(User $user, Ticket $ticket)
    {
        if ($user->role === 'admin') return true;
        if ($user->role === 'tecnico' && $ticket->tecnico_id === $user->id) return true;
        return false;
    }
}
