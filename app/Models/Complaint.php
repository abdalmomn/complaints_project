<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'complaints';

    protected $fillable = [
        'reference_code',
        'title',
        'description',
        'priority',
        'status',
        'locked_by',
        'complaint_type_id',
        'government_agency_id',
        'user_id',
        'assigned_to',
    ];
    /*
       *** Relations ***
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public function lockedBy()
    {
        return $this->belongsTo(User::class, 'locked_by');
    }
    public function complaintType()
    {
        return $this->belongsTo(ComplaintType::class);
    }
    public function governmentAgency()
    {
        return $this->belongsTo(GovernmentAgency::class);
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
    public function media()
    {
        return $this->hasMany(Media::class);
    }
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
    public function histories()
    {
        return $this->hasMany(ComplaintHistory::class);
    }

}
