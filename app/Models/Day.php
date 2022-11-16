<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    public function dest_packs() 
    {
        return $this->hasMany(dest_pack::class);
    }

    public function rest_packs() 
    {
        return $this->hasMany(rest_pack::class);
    }
}
