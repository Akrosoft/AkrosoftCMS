<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteAttribute;
use App\AttributeCategory;
use App\AttributeCollection;
use App\AttributeOtherLabel;
use App\Http\Controllers\SiteAttributeController;
use App\Http\Controllers\AttributeImageController;
use App\AttributeImages;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
    *Show the application dashboard.
    *
    *@return \Illuminate\Http\Response
    */
    public function index() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.index')->with($data);
    }

    public function contentCategories() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.content-categories')->with($data);
    }

    public function contents() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.contents')->with($data);
    }

    public function attributes() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.attributes')->with($data);
    }

    public function adminUserProfile() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.profile')->with($data);
    }

    public function addAttributes(Request $request){
        if ($request->ajax()) {

            $this->validate($request, [
                'formData' => 'required',
            ]);

            $siteAttribute = SiteAttribute::where('collection_id', $request->formData['attr_parameter'])->get();
        
            if($request->formData['attr_parameter'] == 1) {
                $siteAttribute = collect(new SiteAttribute);
            }

            if ($siteAttribute->isNotEmpty()){
                return response()->json([
                    'status' => false,
                    'message' => 'Site attribute already exist. Please edit site attribute from the field provided.',
                    'url' => ''
                ]);
            } else {
                $newSiteAttribute = new SiteAttribute;

                $newSiteAttribute->collection_id = $request->formData['attr_parameter'];
                $newSiteAttribute->value = $request->formData['attr_value'];
                $newSiteAttribute->description = $request->formData['attr_desc'];

                if ($newSiteAttribute->save()) {

                    if($request->formData['attr_category'] == 3){
                        $otherLabel = new AttributeOtherLabel;
                        $otherLabel->site_attr_id = $newSiteAttribute->id;
                        $otherLabel->label = $request->formData['attr_label'];
                        $otherLabel->save();
                    }
                    return response()->json([
                        'status' => true,
                        'message' => 'Site attribute created successfully',
                        'url' => '/manager/site-attributes'
                    ]);
                }
            }
        
        }
    }

    public function handleSiteAttributeDeleteRequest(Request $request) {
        if($request->ajax()) {

            $delete_factor = $request->delete_factor;
            $wasDeleted = false;

            switch($delete_factor) {
                case 'image-attribute':
                    $wasDeleted = AttributeImageController::destroy($request->id);
                    break;

                default:
                    $wasDeleted = SiteAttributeController::destroy($request->id);
                    break;
            }

            if($wasDeleted) {
                return response()->json([
                    'status' => true,
                    'message' => 'Site attribute was deleted successfully',
                    'url' => '/manager/site-attributes'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Site attribute delete attempt was NOT successful.',
                'url' => '/manager/site-attributes'
            ]);
        }
    }

    public function handleSiteAttributeUpdateRequest(Request $request) {
        if($request->ajax()) {
            foreach($request->formData as $key=>$data) {
                $isValid = SiteAttributeController::update($key, $data);
                if(!$isValid) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Site attribute update attempt was NOT successful. Please TRY again.',
                        'url' => '/manager/site-attributes'
                    ]);
                }
            }
            return response()->json([
                'status' => true,
                'message' => 'Site attribute was updated successfully',
                'url' => '/manager/site-attributes'
            ]);
        }
    }

    public function handleUploadAttributeImage(Request $request) {
        if($request->ajax()) {
            $isValid = $this->validate($request, [
                'logo_file_upload' => 'required|mimes:jpeg,png,jpg|max:2048',
                'img_label' => 'required'
            ]);
            
            $image = $request->file('logo_file_upload');
            $upload = rand() . "." . $image->getClientOriginalExtension();
            $destination = '/storage/images/uploads/' . $upload;
            
            $uploaded_image = new AttributeImages;
            $uploaded_image->image_ref = $destination;
            $uploaded_image->label = $request->img_label;

            if ($uploaded_image->save()) {
                $image->move(public_path('/storage/images/uploads/'), $upload);
                return response()->json([
                    'status' => true,
                    'message' => 'Image was uploaded successfully',
                    'image_link' => $destination
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Image upload attempt was NOT successful.',
                'image_link' => ""
            ]);
        }
    }

    public function contentImages() {
        return view('admin.content-images');
    }

    public function contentDocuments() {
        return view('admin.content-documents');
    }

    public function contactList() {
        return view('admin.contact-list');
    }

    public function emailTemplates() {
        return view('admin.email-template');
    }

    public function composeEmail() {
        return view('admin.email-compose');
    }

    
}
