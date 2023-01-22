<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technique extends Model
{
    use HasFactory;
    protected $primaryKey = 'code';

    public function drinks()
    {
        // return $this->hasMany(Drink::class);
        return $this->hasMany(Drink::class, 'technique', 'code');
    }
}
