<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapTeknisi extends Model
{
    use HasFactory;

    protected $table = 'rekap_teknisi';

    protected $fillable = [
        'technician_id',
        'status',
    ];

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }
}
