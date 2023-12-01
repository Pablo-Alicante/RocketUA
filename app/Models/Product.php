<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model // Hereda de Model
{
    public function Category()
    {
        return $this->hasOne(Category::class);
    }
}
