<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'city_id'];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
