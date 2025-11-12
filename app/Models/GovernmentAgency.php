<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernmentAgency extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'government_agencies';

    protected $fillable = [
        'code',
        'agency_name',
        'email',
        'phone',
        'description',
        'is_active',
        'address_id',
    ];

    /*
       *** Relations ***
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
