<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
