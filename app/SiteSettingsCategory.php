<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettingsCategory extends Model
{
    protected $table = "site_settings_categories";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function collections() {
        return $this->hasMany('App\SitePageSettingCollection', 'category_id', 'id');
    }

    public static function getAllSiteSettingsCategory() {
        return static::all();
    }
}
