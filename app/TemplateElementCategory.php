<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateElementCategory extends Model
{
    protected $table = "template_element_categories";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function elements() {
        return $this->hasMany('App\TemplateElement', 'category_id', 'id');
    }

    public static function getAllTemplateElementCategories() {
        return static::all();
    }
}
