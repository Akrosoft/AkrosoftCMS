<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeOtherLabel extends Model
{
    protected $table = 'attribute_other_labels';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function siteAttribute() {
        return $this->belongsTo('App\SiteAttribute', 'site_attr_id', 'id');
    }
}
