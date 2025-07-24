<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'service',
        'vehicle',
        'vehicle_number',
        'service_date',
        'service_time', // <-- Add this!
        'special_request',
    ];
}
