<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workshopReports extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id',
        'total_transactions',
        'total_revenue',
        'total_spare_parts_sold',
        'total_services_completed',
        'report_period'
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshops::class);
    }
}
