<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function responseID() {
        return $this->belongsTo('App\ResponseCode', 'response_id', 'id');
    }
}
