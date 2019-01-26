<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailStatusCode extends Model
{
    protected $table = 'email_status_codes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function emails() {
        return $this->hasMany('App\Email', 'status', 'id');
    }
}
