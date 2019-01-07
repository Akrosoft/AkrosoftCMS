<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeCategory extends Model
{
    protected $table = 'attribute_categories';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function attributeCollection() {
        return $this->hasMany('App\AttributeCollection', 'category_id', 'id');
    }

    public static function getAllAttributeCategory() {
        return static::all();
    }

    public static function getAttributeCategoryByID($id) {
        return static::findOrFail($id);
    }

    public static function getAttributeCategoryName($id) {
        return static::findOrFail($id)->name;
    }
}
