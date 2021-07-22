<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
        /**
     * Roles has  many users
     *
     * @return void
     */
    public function users(){
        return $this->hasMany(User::class);
    }
}
