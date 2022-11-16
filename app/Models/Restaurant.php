<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rest_packs() 
    {
        return $this->hasMany(rest_pack::class);
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
