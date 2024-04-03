<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSponsorship extends Model
{
    use HasFactory;

    public $table = 'doctor_sponsorship';

    protected $fillable = ['doctor_id', 'sponsorship_id', 'start_timestamp', 'end_timestamp'];
}
