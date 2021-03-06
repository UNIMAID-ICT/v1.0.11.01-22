<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'academic_id', 'student_level',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
