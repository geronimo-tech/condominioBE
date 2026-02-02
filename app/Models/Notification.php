<?php

namespace App\Models;

use App\Events\NotificationCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'body',
        'read',
    ];

    protected static function booted()
    {
        static::created(function ($notification) {
            event(new NotificationCreated($notification));
        });
    }
}
