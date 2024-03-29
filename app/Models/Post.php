<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'post_text' => ['required','string','max:400'],
        'star' => ['numeric','required'],
    );

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop():BelongsToMany
    {
        return $this->belongsToMany(Shop::class, 'post_shop', 'post_id', 'shop_id');
    }
}
