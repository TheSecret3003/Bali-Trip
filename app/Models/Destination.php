<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dest_packs() 
    {
        return $this->hasMany(dest_pack::class);
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
