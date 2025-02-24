<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'time_slot',
        'status', // pending, confirmed, completed, cancelled
    ];

    // Relationship with Patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    // Relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

}
