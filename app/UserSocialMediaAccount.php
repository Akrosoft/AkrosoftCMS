<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialMediaAccount extends Model
{
    protected $table = 'user_social_media_accounts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\AdminUser', 'user_id', 'id');
    }

    public function attributeCollection() {
        return $this->belongsTo('App\AttributeCollection', 'collection_id', 'id');
    }

    public static function getUserSocialMediaAccount($id) {
        return static::where('user_id', $id)->get();
    }

    
}
