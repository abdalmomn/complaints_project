<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintHistory extends Model
{
    use HasFactory;

    protected $table = 'complaint_histories';

    protected $fillable = [
        'action',
        'old_value',
        'new_value',
        'note',
        'complaint_id',
        'performed_by',
    ];

    /*
       *** Relations ***
    */

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function performedBy()
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}
