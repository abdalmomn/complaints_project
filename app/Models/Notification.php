<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'sender_id',
        'title',
        'message',
        'notification_type',
        'notifiable',
        'read_at',
        'scheduled_at',
        'sent_at',
    ];

    /*
       *** Relations ***
    */

    public function notifiable()
    {
        return $this->morphTo();
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    //receiver
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
