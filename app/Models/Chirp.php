<?php

namespace App\Models;
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
    ];
//TODO to be removed to activate sending email event
//    protected $dispatchesEvents = [
//        'created' => ChirpCreated::class,
//    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
