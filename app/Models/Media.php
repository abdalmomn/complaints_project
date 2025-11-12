<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'media';

    protected $fillable = [
        'complaint_id',
        'file_type',
        'extension',
        'path',
        'mime_type',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /*
       *** Relations ***
    */

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
