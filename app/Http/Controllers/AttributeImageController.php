<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttributeImages;

class AttributeImageController extends Controller
{
    public static function store() {

    }

    public static function update($id, $data) {
        
    }

    public static function destroy($id) {
        return AttributeImages::findOrFail($id)->delete();
    }
}
