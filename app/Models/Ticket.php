<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'category',
        'priority',
        'status',
        'user_id',
        'tecnico_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function histories()
    {
        return $this->hasMany(TicketHistory::class);
    }

    protected static function booted(): void
    {
        static::updating(function (Ticket $ticket) {
            $original = $ticket->getOriginal();
            $userId = Auth::id() ?: $ticket->user_id;

            if ($original['status'] !== $ticket->status) {
                TicketHistory::create([
                    'ticket_id' => $ticket->id,
                    'user_id' => $userId,
                    'field_changed' => 'status',
                    'old_value' => $original['status'],
                    'new_value' => $ticket->status,
                ]);
            }

            if ((string) $original['tecnico_id'] !== (string) $ticket->tecnico_id) {
                TicketHistory::create([
                    'ticket_id' => $ticket->id,
                    'user_id' => $userId,
                    'field_changed' => 'tecnico_id',
                    'old_value' => $original['tecnico_id'],
                    'new_value' => $ticket->tecnico_id,
                ]);
            }
        });
    }
}
