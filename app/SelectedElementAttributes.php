<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedElementAttributes extends Model
{
    protected $table = "selected_element_attributes";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function attribute() {
        return $this->belongsTo('App\TemplateElementAttribute', 'attribute_id', 'id');
    }

    public function menu() {
        return $this->belongsTo('App\SiteMenu', 'target_id', 'id');
    }

    public static function getAllSelectedAttributes() {
        return static::all();
    }

    public static function getSelectedAttributes($attribute_id) {
        return static::where('attribute_id', $attribute_id)->get();
    }
}
