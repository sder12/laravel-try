<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'technique'];

    public function technique()
    {
        // return $this->belongsTo(Technique::class);
        return $this->belongsTo(Technique::class, 'technique', 'code');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
