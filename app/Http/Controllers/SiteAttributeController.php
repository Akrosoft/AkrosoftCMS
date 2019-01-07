<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteAttribute;
use App\AttributeCategory;
use App\AttributeCollection;
use App\AttributeImages;

class SiteAttributeController extends Controller
{
    public static function store() {

    }

    public static function update($id, $data) {
        $siteAttribute = SiteAttribute::findOrFail($id);
        $siteAttribute->value = $data;
        if ($siteAttribute->save()) {
            return true;
        }
    }

    public static function destroy($id) {
        return SiteAttribute::findOrFail($id)->delete();
    }

    public static function getAllSiteAttributeParameter() {
        $siteAttributes = SiteAttribute::getAllSiteAttribute();
        $attributeCountArray = static::getAttributeCountArray($siteAttributes);
        $data = [
            'siteAttributes' => $siteAttributes,
            'attributeCollections' => AttributeCollection::getAllAttributeCollection(),
            'attributeCategories' => AttributeCategory::getAllAttributeCategory(),
            'basicCount' => $attributeCountArray['basic'],
            'socialMediaCount' => $attributeCountArray['social_media'],
            'customCount' => $attributeCountArray['custom'],
            'name' => SiteAttribute::getClientName(),
            'shortName' => SiteAttribute::getClientShortName(),
            'logo' => SiteAttribute::getClientLogo(),
            'loginImage' => SiteAttribute::getClientLoginImage(),
            'copyRight' => SiteAttribute::getClientCopyRight(),
            'attributeImages' => AttributeImages::getAllImages()
        ];

        return $data;
    }

    private static function getAttributeCountArray($siteAttributes) {
        $basic = 0;
        $social_media = 0;
        $custom = 0;

        foreach($siteAttributes as $siteAttribute) {
            switch($siteAttribute->attributeCollection->category_id) {
                case 1:
                    $basic += 1;
                    break;

                case 2:
                    $social_media += 1;
                    break;

                default:
                    $custom += 1;
                    break;
            }
        }
        
        return [
            'basic' => $basic,
            'social_media' => $social_media,
            'custom' => $custom
        ];
    }
}
