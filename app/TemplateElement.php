<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateElement extends Model
{
    protected $table = "template_elements";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function template() {
        return $this->belongsTo('App\Template', 'template_id', 'id');
    }

    public function category() {
        return $this->belongsTo('App\TemplateElementCategory', 'category_id', 'id');
    }

    public function elementAttributes() {
        return $this->hasMany('App\TemplateElementAttribute', 'element_id', 'id');
    }

    public function selectedElements() {
        return $this->hasMany('App\SelectedElement', 'element_id', 'id');
    }

    public static function getAllTemplateElements() {
        return static::all();
    }

    public static function getTemplateElementByID($id) {
        return static::findOrFail($id);
    }
}
