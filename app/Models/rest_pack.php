<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rest_pack extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'day_id',
    ];

    public function package() 
    {
        return $this->belongsTo(Package::class);
    }

    public function day() 
    {
        return $this->belongsTo(Day::class);
    }

    public function restaurant() 
    {
        return $this->belongsTo(Restaurant::class);
    }
}
