<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date',
        'start_time',
        'end_time'
    ];

    public function users(){

        return $this->hasMany(User::class);
    
    }
}
