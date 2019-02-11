<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = "templates";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function elements() {
        return $this->hasMany('App\TemplateElement', 'template_id', 'id');
    }

    public static function getTemplateByID($id) {
        return static::find($id);
    }

    public static function getAllTemplates() {
        return static::all();
    }
}
