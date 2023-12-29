<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Favorite extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function shop():BelongsToMany
    {
        return $this->belongsToMany(Shop::class, 'favorite_shop', 'favorite_id', 'shop_id');
    }
}
