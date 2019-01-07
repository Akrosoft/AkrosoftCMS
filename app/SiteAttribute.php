<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AttributeCollection;

class SiteAttribute extends Model
{
    protected $table = 'site_attributes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function attributeCollection() {
        return $this->belongsTo('App\AttributeCollection', 'collection_id', 'id');
    }

    public function otherLabel() {
        return $this->hasOne('App\AttributeOtherLabel', 'site_attr_id', 'id');
    }

    public static function getAllSiteAttribute() {
        return static::all();
    }

    public static function getSiteAttributeByID($id) {
        return static::findOrFail($id);
    }

    public static function getClientName() {
        $default_value = 'Akrosoft CMS';
        $attribute_id = AttributeCollection::getClientNameID();
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return $attribute[0]->value;
            }
            return $default_value;
        }
        return $default_value;
        
    }

    public static function getClientShortName() {
        $default_value = 'CMSadmin';
        $attribute_id = AttributeCollection::getClientShortNameID();
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return $attribute[0]->value;
            }
            return $default_value;
        }
        return $default_value;
        
    }

    public static function getClientLogo() {
        $default_logo = asset('storage/images/uploads/default_logo.png');
        $attribute_id = AttributeCollection::getClientLogoID();
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return $attribute[0]->value;
            }
            return $default_logo;
        }
        return $default_logo;
        
    }

    public static function getClientLoginImage() {
        $default_login_image = asset('storage/images/uploads/login.jpg');
        $attribute_id = AttributeCollection::getClientLoginImageID();
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return $attribute[0]->value;
            }
            return $default_login_image;
        }
        return $default_login_image;   
    }

    public static function getClientCopyRight() {
        $default_value = "&copy; " . date('Y') . " Akrosoft, All right reserved.";
        $attribute_id = AttributeCollection::getClientCopyRightID();
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return "&copy; " . date('Y') . " " . $attribute[0]->value . ", All right reserved.";
            }
            return $default_value;
        }
        return $default_value;
    }
}
