<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dest_pack extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'day_id'
    ];

    public function package() 
    {
        return $this->belongsTo(Package::class);
    }

    public function day() 
    {
        return $this->belongsTo(Day::class);
    }

    public function destination() 
    {
        return $this->belongsTo(Destination::class);
    }
}
