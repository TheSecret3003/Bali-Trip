<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel_pack extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id'
    ];

    public function package() 
    {
        return $this->belongsTo(Package::class);
    }

    public function hotel() 
    {
        return $this->belongsTo(Hotel::class);
    }
}
