<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'text', 'name', 'email'];

    public function doctors()
    {
        return $this->belongsTo(doctor::class);
    }
}
