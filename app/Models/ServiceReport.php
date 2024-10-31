<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'technician_id',
        'diagnosis',
        'action_taken',
        'time_estimate',
        'process_date',
        'service_cost',
        'parts_cost',
        'total_cost',
    ];

    protected $casts = [
        'service_cost' => 'decimal:2',
        'parts_cost' => 'decimal:2',
        'total_cost' => 'decimal:2',
        'process_date' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($report) {
            $report->total_cost = $report->service_cost + $report->parts_cost;
        });

        static::updating(function ($report) {
            $report->total_cost = $report->service_cost + $report->parts_cost;
        });
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
