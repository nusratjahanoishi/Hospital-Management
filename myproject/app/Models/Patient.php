<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile_picture',
        'gender',
        'dob',
        'blood_group',
        'nationality',
        'myself',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
