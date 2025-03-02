<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_name',
        'gender',
        'dob',
        'blood_group',
        'doctor_id',
        'test_id',
        'test_date',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
