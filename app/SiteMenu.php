<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteMenu extends Model
{
    protected $table = "site_menus";
    protected $primaryKey = "id";
    public $timestamp = true;

    public function page() {
        return $this->belongsTo('App\SitePage', 'page_id', 'id');
    }

    public function link() {
        return $this->belongsTo('App\SelectedElementAttributes', 'target_id', 'id');
    }

    public static function getAllMenus() {
        return static::all();
    }

    public static function getAllMainMenus() {
        return static::where('parent_id', 0)->get(); 
    }

    public static function getAllSubMenus() {
        return static::where('parent_id', '>', 0)->get();
    }

    public function hasSubMenu($id) {
        $menus = static::getAllMenus();

        foreach($menus as $menu) {
             if($id == $menu->parent_id) {
                 return true;
             }
        }
        return false;
    }

    public static function isSiteMenuConfigured() {
        $menu = static::all();
        if ($menu->isNotEmpty()) {
            return true;
        }
        return false;
    }
}
