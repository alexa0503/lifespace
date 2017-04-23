<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function items()
    {
        return $this->belongsToMany('App\Item', 'item_categories', 'category_id', 'item_id');
    }
}
