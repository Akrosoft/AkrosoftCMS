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

    public static function getClientSocialMediaAccounts() {
        $social_media = [];
        $social_media_attributes = AttributeCollection::getCollectionsByCategoryID();
        if ($social_media_attributes->isNotEmpty()) {
            foreach ($social_media_attributes as $attribute_collection) {
                $attribute = static::where('collection_id', $attribute_collection->id )->get();
                if($attribute->isNotEmpty()) {
                    $attribute = $attribute[0];
                    $social_media[] = $attribute;
                }
            }
        }
        return collect($social_media); 
    }

    public static function getClientAddress() {
        $default_address = 'Client address has not been set.';
        $attribute_id = AttributeCollection::getClientAttributeCollectionID('address');
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return $attribute[0]->value;
            }
            return $default_address;
        }
        return $default_address;   
    }

    public static function getClientEmail() {
        $default_email = 'Client email has not been set.';
        $attribute_id = AttributeCollection::getClientAttributeCollectionID('email');
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return $attribute[0]->value;
            }
            return $default_email;
        }
        return $default_email;   
    }

    public static function getClientTelephone() {
        $default_phone = 'Client phone has not been set.';
        $attribute_id = AttributeCollection::getClientAttributeCollectionID('phone');
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return $attribute[0]->value;
            }
            return $default_phone;
        }
        return $default_phone;   
    }

    public static function getContactInfo() {
        $data = [
            'address' => static::getClientAddress(),
            'email' => static::getClientEmail(),
            'phone' => static::getClientTelephone()
        ];
        return (object)$data;
    }

    public static function getClientEmailSendDetails() {
        $isValidEmail = false;
        $default_value = (object)['name'=>'Akrosoft CMS', 'domain' => 'akrosoft-cms.net'];
        $senderNameAttribute_id = AttributeCollection::getClientEmailSenderName();
        $senderDomainAttribute_id = AttributeCollection::getClientEmailSenderDomain();

        if ($senderNameAttribute_id && $senderDomainAttribute_id) {
            $senderNameAttribute = static::where('collection_id', $senderNameAttribute_id )->get(); 
            $senderDomainAttribute = static::where('collection_id', $senderDomainAttribute_id )->get();
            if (
                $senderNameAttribute->isNotEmpty() && 
                $senderDomainAttribute->isNotEmpty()
                ) {
                $isValidEmail = true;
                $senderNameAttribute = $senderNameAttribute[0];
                $senderDomainAttribute = $senderDomainAttribute[0];
            }

        }

        if($isValidEmail) {
            return (object)[
                'name' => $senderNameAttribute->value, 
                'domain' => $senderDomainAttribute->value
            ];
        }
        return $default_value;
    }

    public static function isClientLogoSet() {
        $attribute_id = AttributeCollection::getClientLogoID();
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function isClientSocialMediaConfigured() {
        $configured = false;
        $social_media_attributes = AttributeCollection::getCollectionsByCategoryID();
        if ($social_media_attributes->isNotEmpty()) {
            foreach ($social_media_attributes as $attribute_collection) {
                $attribute = static::where('collection_id', $attribute_collection->id )->get();
                if($attribute->isNotEmpty()) {
                    $configured = true;
                }
            }
        }
        return $configured; 
    }

    public static function isCopyRightInfoSet() {
        $attribute_id = AttributeCollection::getClientCopyRightID();
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function isContactInfoSet() {
        $clientAddress = static::isClientAddressInfoSet();
        $clientEmail = static::isClientEmailInfoSet();
        $clientTelephone = static::isClientTelephoneInfoSet();

        if ( $clientAddress && $clientEmail && $clientTelephone ) {
            return true;
        }
        return false;
    }

    public static function isClientAddressInfoSet() {
        $attribute_id = AttributeCollection::getClientAttributeCollectionID('address');
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function isClientEmailInfoSet() {
        $attribute_id = AttributeCollection::getClientAttributeCollectionID('email');
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function isClientTelephoneInfoSet() {
        $attribute_id = AttributeCollection::getClientAttributeCollectionID('phone');
        if($attribute_id) {
            $attribute = static::where('collection_id', $attribute_id )->get();
            if($attribute->isNotEmpty()) {
                return true;
            }
            return false;
        }
        return false;
    }
}
