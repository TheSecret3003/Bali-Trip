<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car_order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image()
    {
        if (($this->image)) {
            $image_path = $this->image;
            return '/storage/' . $image_path;
        }
        else {
            return "";
        }
    }

    public function Car() 
    {
        return $this->belongsTo(Car::class);
    }

    public function User() 
    {
        return $this->belongsTo(User::class);
    }
}
