<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Package extends Model
{
    use HasFactory,Notifiable;

    protected $guarded = [];

    public function dest_packs() 
    {
        return $this->hasMany(dest_pack::class);
    }

    public function rest_packs() 
    {
        return $this->hasMany(rest_pack::class);
    }

    public function hotel_packs() 
    {
        return $this->hasMany(hotel_pack::class);
    }

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

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
}
