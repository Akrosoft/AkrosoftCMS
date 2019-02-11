<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseCode extends Model
{
    protected $table = 'response_codes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function contact() {
        return $this->hasOne('App\Contact', 'response_id', 'id');
    }
}
