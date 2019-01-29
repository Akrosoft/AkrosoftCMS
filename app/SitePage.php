<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
    protected $table = 'site_pages';
    protected $primaryKey = 'id';
    public $timestamp = true;

    public static function getAllSitePages() {
        return static::all();
    }

    public static function getSitePageBySlug($slug) {
        return static::where('slug', $slug)->get();
    }

    public function hasPageSections() {
        return false;
    }

    public function hasPageMenu() {
        return true;
    }

    public function hasPageFooter() {
        return true;
    }
}
