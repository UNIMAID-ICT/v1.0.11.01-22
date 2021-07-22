<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Get the user that owns the Person Records.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
