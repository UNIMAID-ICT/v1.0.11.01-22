<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Get the department that owns the programmes
     *
     * @return void
     */
    public function department(){
        return $this->belongsTo(Department::class);
    }
    
    /**
     * Get the courses for the programme
     *
     * @return void
     */
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
