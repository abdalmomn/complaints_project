<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    use HasFactory;

    protected $table = 'otp_codes';

    protected $fillable = [
        'code',
        'expires_at',
        'user_id',
    ];

    /*
       *** Relations ***
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
