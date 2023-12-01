<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function lines()
    {
        return $this->hasMany(CartLine::class);
    }
}
