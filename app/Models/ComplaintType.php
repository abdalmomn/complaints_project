<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintType extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'complaint_types';

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    /*
       *** Relations ***
    */
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
