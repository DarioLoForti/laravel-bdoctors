<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['rating'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
