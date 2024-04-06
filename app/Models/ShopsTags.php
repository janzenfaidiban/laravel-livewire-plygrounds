<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopsTags extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'tag_id'];


}
