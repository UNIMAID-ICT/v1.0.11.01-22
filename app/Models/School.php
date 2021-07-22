<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function departments(){
    //     return $this->belongsToMany(Department::class);
    // }
    
    /**
     * Get the departments for the Faculty/College
     *
     * @return void
     */
    public function departments(){
        return $this->hasMany(Department::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    

}
