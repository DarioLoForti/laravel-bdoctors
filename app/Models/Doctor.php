<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    // use SoftDeletes;

    use HasFactory;
    protected $fillable = ['user_id', 'city', 'phone', 'image', 'cv', 'services'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function ratings()
    {
        return $this->belongsToMany(Rating::class);
    }
}
