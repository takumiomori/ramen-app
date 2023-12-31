<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shopcategory extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );

    public function shop():BelongsToMany
    {
        return $this->belongsToMany(Shop::class, 'shopcategory_shop', 'shopcategory_id', 'shop_id');
    }
}
