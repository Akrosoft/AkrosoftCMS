<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeImages extends Model
{
    protected $table = 'attribute_images';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function attributeCollection() {
        return $this->belongsTo('App\AttributeCollection', 'collection_id', 'id');
    }

    public static function getAllImages() {
        return static::all();
    }
}
