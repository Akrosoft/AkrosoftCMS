<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitePageSetting extends Model
{
    protected $table = "site_page_settings";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function collection() {
        return $this->belongsTo('App\SitePageSettingCollection', 'collection_id', 'id');
    }

    public static function getPageSettings() {
        return static::all();
    }

    public static function getPageTemplateSetting() {
        $template = static::where('collection_id', 1)->get();

        if ($template->isEmpty()) {
            return collect(new SitePageSetting);
        }

        $template = $template[0];

        return $template;
    }

    public static function getPageTemplateMenuSetting() {
        $menu = static::where('collection_id', 2)->get();

        if ($menu->isEmpty()) {
            return collect(new SitePageSetting);
        }

        $menu = $menu[0];

        return $menu;
    }

    public static function getPageTemplateFooterSetting() {
        $footer = static::where('collection_id', 3)->get();

        if ($footer->isEmpty()) {
            return collect(new SitePageSetting);
        }

        $footer = $footer[0];

        return $footer;
    }
}
