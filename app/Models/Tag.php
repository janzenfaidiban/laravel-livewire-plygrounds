<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function shops()
    {
        return $this->hasManyThrough(Shop::class, ShopsTags::class, 'tag_id', 'id', 'id', 'shop_id');
    }

}
