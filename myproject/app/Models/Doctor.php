<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'profile_picture', 
        'gender', 
        'dob', 
        'blood_group', 
        'nationality', 
        'specialization_id', 
        'medical_reg_no', 
        'qualification', 
        'experience', 
        'myself'
    ];
    public function doctorExpart()
    {
        return $this->belongsTo(DoctorExpart::class, 'specialization_id'); 
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
