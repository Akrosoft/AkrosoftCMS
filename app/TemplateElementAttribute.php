<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateElementAttribute extends Model
{
    protected $table = "template_element_attributes";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function element() {
        return $this->belongsTo('App\TemplateElement', 'element_id', 'id');
    }

    public function selectedAttribute() {
        return $this->hasOne('App\SelectedElementAttributes', 'attribute_id', 'id');
    }

    public static function getAllTemplateElementAttributes() {
        return static::all();
    }
}
