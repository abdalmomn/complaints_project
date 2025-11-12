<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'email',
        'identity_number',
        'is_active',
        'last_login_at',
        'government_agency_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
        *** Relations ***
     */
    public function government_agency()
    {
        return $this->belongsTo(GovernmentAgency::class);
    }

    public function otpCodes()
    {
        return $this->hasMany(OtpCode::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
    public function assignedComplaints()
    {
        return $this->hasMany(Complaint::class, 'assigned_to');
    }
    public function lockedComplaints()
    {
        return $this->hasMany(Complaint::class, 'locked_by');
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function complaintHistories()
    {
        return $this->hasMany(ComplaintHistory::class, 'performed_by');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function generatedReports()
    {
        return $this->hasMany(Report::class, 'generated_by');
    }

    public function createdMedia()
    {
        return $this->hasMany(Media::class, 'created_by');
    }

    public function createdAddresses()
    {
        return $this->hasMany(Address::class, 'created_by');
    }

}
