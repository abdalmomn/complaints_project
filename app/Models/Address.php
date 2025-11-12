<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'addresses';

    protected $fillable = [
        'city',
        'area',
        'street',
        'floor',
        'near',
        'longitude',
        'latitude',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /*
       *** Relations ***
    */

    public function government_agency()
    {
        return $this->hasOne(GovernmentAgency::class);
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

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
