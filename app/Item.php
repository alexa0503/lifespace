<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function itemAttributes()
    {
        return $this->hasMany('App\ItemAttribute');
    }
    public function getItemAttribute($name)
    {
        $attributes = $this->itemAttributes->filter(function($value, $key) use($name){
            return $value->name == $name;
        })->all();
        return count($attributes) > 0 ? array_values($attributes)[0] : (object)(['title'=>'','content'=>'']);
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'item_categories', 'item_id', 'category_id');
    }
    public function getCategoryKeysAttribute($value)
    {
        $categories = $this->categories;
        $keys = [];
        foreach($categories as $category){
            $keys[] = $category->id;
        }
        return $keys;
    }
}
