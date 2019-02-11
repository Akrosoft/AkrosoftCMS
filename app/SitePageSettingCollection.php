<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitePageSettingCollection extends Model
{
    protected $table = "site_page_setting_collections";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function category() {
        return $this->belongsTo('App\SiteSettingCategory', 'category_id', 'id');
    }

    public function pageSetting() {
        return $this->hasMany('App\SitePageSetting', 'collection_id', 'id');
    }

    public static function getAllSitePageSettingsCollection() {
        return static::all();
    }
}
