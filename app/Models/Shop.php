<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'place_id' => 'required',
        'shopcategory_id' => 'required',
        'holiday' => 'required',
        'tel' => ['required', 'regex:/^[0-9-]+$/'],
        'address' => 'required',
        'open_time' => 'required',
        'menu' => 'required',
    );

    public function place(){
        return $this->belongsTo(Place::class);
    }

    public function favorite():BelongsToMany
    {
        return $this->belongsToMany(Favorite::class, 'fvorite_shop', 'shop_id', 'favorite_id');
    }

    public function post():BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_shop', 'shop_id', 'post_id');
    }

    public function shopcategory():BelongsToMany
    {
        return $this->belongsToMany(Shopcategory::class, 'shopcategory_shop', 'shop_id', 'shopcategory_id');
    }

    public function scopeMatchCategory($query, $n)
    {
        return $query->whereHas('shopcategory', function ($subquery) use ($n) {
            $subquery->where('shopcategories.id', $n);
        });
    }

    public function scopeMatchPlace($query, $n)
    {
        return $query->where('place_id', '=', $n);
    }


}
