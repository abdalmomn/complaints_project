<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'reports';

    protected $fillable = [
        'government_agency_id',
        'report_type',
        'statistic_type',
        'date',
        'value',
        'metadata',
        'generated_by',
    ];

    /*
       *** Relations ***
    */
    public function governmentAgency()
    {
        return $this->belongsTo(GovernmentAgency::class);
    }

    public function generatedBy()
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
