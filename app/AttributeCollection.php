<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeCollection extends Model
{
    protected $table = 'attribute_collections';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function attributeCategory() {
        return $this->belongsTo('App\AttributeCategory', 'category_id', 'id');
    }

    public function siteAttribute() {
        return $this->hasMany('App\SiteAttribute', 'collection_id', 'id');
    }

    public function userSocialMedia() {
        return $this->hasMany('App\UserSocialMediaAccount', 'collection_id', 'id');
    }

    public function siteImage() {
        return $this->hasMany('App\AttributeImages', 'collection_id', 'id');
    }

    public static function getAllAttributeCollection() {
        return static::all();
    }

    public static function getAttributeCollectionByID($id) {
        return static::findOrFail($id);
    }

    public static function getClientNameID() {
        $collecttion = static::where('name', 'name')->get();
        if($collecttion->isNotEmpty()) {
            return $collecttion[0]->id;
        }
        return null;
    }

    public static function getClientShortNameID() {
        $collecttion = static::where('name', 'short_name')->get();
        if($collecttion->isNotEmpty()) {
            return $collecttion[0]->id;
        }
        return null;
    }

    public static function getClientLogoID() {
        $collecttion = static::where('name', 'logo')->get();
        if($collecttion->isNotEmpty()) {
            return $collecttion[0]->id;
        }
        return null;
    }

    public static function getClientLoginImageID() {
        $collecttion = static::where('name', 'login_image')->get();
        if($collecttion->isNotEmpty()) {
            return $collecttion[0]->id;
        }
        return null;
    }

    public static function getClientCopyRightID() {
        $collecttion = static::where('name', 'footer')->get();
        if($collecttion->isNotEmpty()) {
            return $collecttion[0]->id;
        }
        return null;
    }

    public static function getClientEmailSenderName() {
        $collecttion = static::where('name', 'email_sender')->get();
        if($collecttion->isNotEmpty()) {
            return $collecttion[0]->id;
        }
        return null;
    }

    public static function getClientEmailSenderDomain() {
        $collecttion = static::where('name', 'email_domain')->get();
        if($collecttion->isNotEmpty()) {
            return $collecttion[0]->id;
        }
        return null;
    }
}
