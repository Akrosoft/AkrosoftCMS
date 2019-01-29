<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SitePage;

class SitePagesController extends Controller
{
    public static function getHomePage() {
        return static::getSitePageContents(1);
    }

    public static function getPageBySlug() {
        $random = static::getRandomNumber();
        return static::getSitePageContents($random);
    }

    public static function getSitePageContents($page_id) {
        switch($page_id) {
            case 1:
                return "Home Page";
                break;
            case 2:
                return "About Us Page";
                break;
            case 3:
                return "Services Page";
                break;
            case 4:
                return "Portfolio Page";
                break;
            case 5:
                return "Contact Us Page";
                break;
            default:
                return "error";
                break; 
        }
    }

    public static function getRandomNumber() {
        return mt_rand(0, 9);
    }

    public static function getSitePages() {
        return SitePage::getAllSitePages();
    }
}
