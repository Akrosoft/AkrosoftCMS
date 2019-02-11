<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\SiteAttribute;
use App\AttributeCategory;
use App\AttributeCollection;
use App\AttributeOtherLabel;
use App\Http\Controllers\SiteAttributeController;
use App\Http\Controllers\AttributeImageController;
use App\AttributeImages;
use App\AdminUser;
use App\UserSocialMediaAccount;
use App\Contact;
use App\ConfigureEmail;
use App\Email;
use App\SitePage;
use App\SiteMenu;
use App\SelectedElementAttributes;
use Auth;

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

    public function sitePages() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        $data['pages'] = SitePagesController::getSitePages();
        // dd($data);
        return view('admin.site-pages')->with($data);
    }

    public function handleCreateSitePageRequest(Request $request) {
        if($request->ajax()) {
            $this->validate($request, [
                'formData' => 'required'
            ]);

            $page = SitePagesController::getSitePageBySlug($request->formData['create_page_slug']);

            if ($page->isNotEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Site Page was NOT created, page already exist.',
                    'url' => ''
                ]);
            }

            $result = SitePagesController::createSitePage($request->formData);
            if ($result) {
                return response()->json([
                    'status' => true,
                    'message' => 'Site Page was created successfully',
                    'url' => '/manager/site-pages'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Site Page create attempt failed.',
                'url' => ''
            ]);
        }
    }

    public function sitePagePreview($page_slug) {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        $page = SitePagesController::getSitePageBySlug($page_slug);
        $data['page'] = $page[0];
        $data['template_setting'] = SitePagesController::getSiteTemplateSetting();
        $data['footer'] = SitePagesController::getPageFooter();
        $data['menu'] = SitePagesController::getPageMenu();
        $data['admin_preview'] = true;

        // dd($data); 

        return view('admin.preview')->with($data);
    }

    public function sitePageContentManager($page_slug) {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.page-content-manager')->with($data);
    }


    public function siteMenu() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        $data['menus'] = SiteMenu::getAllMenus();
        return view('admin.site-menu')->with($data);
    }

    public function handleUpdateSiteMenuRequest(Request $request) {
        if ($request->ajax()) {
            $this->validate($request, [
                'formData' => 'required'
            ]);

            $menu = SiteMenu::where('page_id', $request->formData['menu_page'])->get();

            if($menu->isNotEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Menu NOT created, page has already been linked.',
                    'url' => ''
                ]);
            }

            $menu = SiteMenu::where('order', $request->formData['menu_order'])->get();

            if($menu->isNotEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Menu NOT created, menu order number has already been used.',
                    'url' => ''
                ]);
            }

            $result = SitePagesController::createSiteMenu($request->formData);

            if ($result) {
                return response()->json([
                    'status' => true,
                    'message' => 'Site menu was updated successfully',
                    'url' => '/manager/site-menu'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Site menu update attempt failed.',
                'url' => ''
            ]);
        }
    }

    public function siteFooter() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.site-footer')->with($data);
    }

    public function sitePagesSetup() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        $data['setting_categories'] = SitePagesController::getSitePageSetupCategoy();
        $data['setting_collections'] = SitePagesController::getSitePageSetupCollections();
        $data['templates'] = SitePagesController::getAllSiteTemplates();
        $data['template_setting'] = SitePagesController::getSiteTemplateSetting();
        $data['template_menu_setting'] = SitePagesController::getSiteTemplateMenuSetting();
        $data['template_footer_setting'] = SitePagesController::getSiteTemplateFooterSetting();
        $data['template_elements'] = SitePagesController::getAllSiteTemplateElements();
        $data['element_attributes'] = SitePagesController::getAllSiteTemplateElementAttributes();
        $data['element_categories'] = SitePagesController::getAllSiteTemplateElementCategories();
        $data['manual_attribute_links'] = SitePagesController::getAllSiteTemplateElementAttributesManualLinks();
        $data['auto_attributes'] = SitePagesController::getAutoConfigureTemplateAttributes();
        $data['menus'] = SitePagesController::getAllSiteMenus();

        // dd($data);

        return view('admin.site-pages-setup')->with($data);
    }

    public function handleUpdateSitePagesSetupRequest(Request $request) {
        if ($request->ajax()) {
            $this->validate($request, [
                'formData' => 'required'
            ]);

            $result = null;

            switch ($request->formData['action']) {
                case 'update links':
                    $result = SitePagesController::updatePagesSettingsLinks($request->formData);
                    if ($result) {
                        return response()->json([
                            'status' => true,
                            'message' => '',
                            'links' => SitePagesController::getSelectedAttributeLinks($request->formData['attribute_id'])
                        ]);
                        break;
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => '',
                        ]);
                        break;
                    }
                    break;

                case 'update template settings':
                    $result = SitePagesController::updateSiteThemeSettings($request->formData);
                    if ($result) {
                        return response()->json([
                            'status' => true,
                            'message' => 'Site Theme was updated successfully',
                            'url' => '/manager/site-pages-setup'
                        ]);
                        break;
                    } else {
                        return response()->json([
                            'status' => false,
                            'message' => 'Site Theme update attempt failed.',
                            'url' => ''
                        ]);
                        break;
                    }
                    break;
                
                default:
                    dd('action has not been configured!!!');
                    break;
            }
        }
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
                    $message = 'Image was deleted successfully';
                    $url = "/manager/site-attributes";
                    break;

                case 'delete-contact':
                    $wasDeleted = Contact::findOrFail($request->id)->delete();
                    $message = 'Message was deleted successfully';
                    $url = "/manager/contact-list";
                    break;
                
                case 'delete-site-attribute-link':
                    $attribute = SelectedElementAttributes::findOrFail($request->id)->attribute;
                    $wasDeleted = SelectedElementAttributes::findOrFail($request->id)->delete();
                    $message = 'Link was deleted successfully';
                    $url = "/manager/site-pages-setup";
                    $data = [
                        'item' => $attribute
                    ];
                    break;

                default:
                    $wasDeleted = SiteAttributeController::destroy($request->id);
                    $message = 'Site attribute was deleted successfully';
                    $url = '/manager/site-attributes';
                    break;
            }

            if($wasDeleted) {
                return response()->json([
                    'status' => true,
                    'message' => $message,
                    'data' => isset($data) ? $data : null,
                    'url' => $url
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Site attribute delete attempt was NOT successful.',
                'url' => ''
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

    public function handleUploadImage(Request $request) {
        if($request->ajax()) {
                
            switch ($request->upload_factor) {
                case 'Admin Profile':
                    $isValid = $this->validate($request, [
                        'profile_file_upload' => 'required|mimes:jpeg,png,jpg|max:2048'
                    ]);

                    $image = $request->file('profile_file_upload');
                    $rand = rand();
                    $upload = rand() . $rand . "." . $image->getClientOriginalExtension();
                    $destination = '/storage/images/profile/' . $upload;
                    
                    $uploaded_image = AdminUser::findOrFail($request->user_id);
                    $uploaded_image->profile_image = $destination;
        
                    if ($uploaded_image->save()) {
                        $image->move(public_path('/storage/images/profile/'), $upload);
                        return response()->json([
                            'status' => true,
                            'message' => 'Image was uploaded successfully',
                            'image_link' => $destination
                        ]);
                    }
                    dd("No");
                    return response()->json([
                        'status' => false,
                        'message' => 'Image upload attempt was NOT successful.',
                        'image_link' => ""
                    ]);
                    break;
                
                default:

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
                    break;
            }
        }
    }

    public function addUserSocialMediaAccount(Request $request) {
        if ($request->ajax()) {

            $this->validate($request, [
                "formData" => "required"
            ]);

            $social_media = new UserSocialMediaAccount;
            $social_media->user_id = $request->formData['sm_user_id'];
            $social_media->collection_id = $request->formData['user_social_media_type'];
            $social_media->value = $request->formData['user_SM_url'];
            
            if ($social_media->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Social media account was added successful.'
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Add user social media attempt was NOT successful.'
            ]);
        }
    }

    public function authenticateLoggedUser(Request $request) {
        if ($request->ajax()) {

            $status = false;
            $message = "Wrong password, try again.";

            if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                $status = true;
                $message = "";
                return response()->json([ 
                    'status' => $status,
                    'message' => $message
                ]);
            }

            return response()->json([ 
                'status' => $status,
                'message' => $message
            ]);

        }
    }

    public function updateLoggedUserPassword(Request $request) {
        if ($request->ajax()) {
            $this->validate($request, [
                'newPassword' => 'required'
            ]);

            $status = false;
            $message = "Password update request failed, please try again.";

            $user = AdminUser::where('email', $request->email)->get();

            if ($user->isNotEmpty()) {
                $user = $user[0];
            }

            $user->password = Hash::make(htmlspecialchars($request->newPassword));

            if ($user->save()) {
                $status = true;
                $message = "Password update request was successful.";
                return response()->json([ 
                    'status' => $status,
                    'message' => $message
                ]);
            }
            return response()->json([ 
                'status' => $status,
                'message' => $message
            ]);
        }
    }

    public function updateLoggedUserProfileDetails(Request $request) {
        if($request->ajax()) {

            $status = false;
            $message = "User profile details update attempt failed";

            $this->validate($request, [
                'formData' => 'required'
            ]);

            $logged_user = AdminUser::where('email', $request->formData['edit_email'])->get();

            if ($logged_user->isNotEmpty()) {
                $logged_user = $logged_user[0];
            }

            $logged_user->name = htmlspecialchars($request->formData['edit_fullname']);
            $logged_user->dob = date('Y-m-d H:i:s', strtotime($request->formData['edit_dob']));
            $logged_user->phone = htmlspecialchars($request->formData['edit_phone']);
            $logged_user->occupation = htmlspecialchars($request->formData['edit_occupation']);
            $logged_user->website = htmlspecialchars($request->formData['edit_website']);
            $logged_user->address = htmlspecialchars($request->formData['edit_address']);
            $logged_user->bio = htmlspecialchars($request->formData['edit_bio']);

            if ($logged_user->save()) {
                $status = true;
                $message = "User profile details update was successful.";
                return response()->json([ 
                    'status' => $status,
                    'message' => $message
                ]);
            }
            return response()->json([ 
                'status' => $status,
                'message' => $message
            ]);
        }
    }

    public function handleReplyContactMessage(Request $request) {
        if($request->ajax()) {
            $status = false;
            $message = "Message reply failed. Please try again later.";
            // validate inputs
            $this->validate($request, [
                'formData' => 'required'
            ]);

            // configure email params

            // send email

            // update contacts table
            $contact = Contact::where('id', $request->formData['id'])->get();

            if($contact->isNotEmpty()) {
                $contact = $contact[0];
            }

            $sender_info = SiteAttribute::getClientEmailSendDetails();

            $result = Email::initializeEmail([
                'message' => $request->formData['response_message'],
                'subject' => auth()->user()->name. ' from ' . SiteAttribute::getClientName(). ": Contact Reply.",
                'recipient' => $contact->email,
                'sender' => Email::buildContact($sender_info->name, "no-reply@" . $sender_info->domain)
            ])->administratorContactReplyEmail();
    
            if ($result) {
                $contact->response_message = $request->formData['response_message'];
                $contact->response_id = 3;
                if ($contact->save()) {
                    $status = true;
                    $message = "Message reply has been sent.";
                    return response()->json([ 
                        'status' => $status,
                        'message' => $message,
                        'url' => '/manager/contact-list'
                    ]);
                }
            } 
            return response()->json([ 
                'status' => $status,
                'message' => $message,
                'url' => ''
            ]);
        }
    }

    public function storeEmailTemplates(Request $request) {
        if ($request->ajax()) {

            $this->validate($request, [
                'formData' => 'required'
            ]);

            $status = false;
            $message = "Add email template attempt was NOT successful";

            if(isset($request->formData['templateID'])? $request->formData['templateID'] : null ) {
                $email_template = ConfigureEmail::find($request->formData['templateID'])->get();
                $email_template = $email_template[0];
                $email_template->name = $request->formData['templateName'];
                $email_template->subject = $request->formData['templateSubject'];
                $email_template->message =$request->formData['templateMessage'];
                $email_template->params = $request->formData['templateParams'];
                if ($email_template->save()) {
                    $status = true;
                    $message = "Email template was updated successfully";
                    return response()->json([ 
                        'status' => $status,
                        'message' => $message
                    ]);
                }
                return response()->json([ 
                    'status' => $status,
                    'message' => "Email template update attempt was NOT successful"
                ]);
            }

            $email_template = ConfigureEmail::where('name', $request->formData['templateName'])->get();

            if ($email_template->isNotEmpty()) {
                $message = $message . " Email template already already exist.";
                return response()->json([ 
                    'status' => $status,
                    'message' => $message
                ]);
            }

            $email_template = new ConfigureEmail;
            $email_template->name = $request->formData['templateName'];
            $email_template->subject = $request->formData['templateSubject'];
            $email_template->message =$request->formData['templateMessage'];
            $email_template->params = $request->formData['templateParams'];

            if ($email_template->save()) {
                $status = true;
                $message = "Email template was added successfully";
                return response()->json([ 
                    'status' => $status,
                    'message' => $message
                ]);
            }
            return response()->json([ 
                'status' => $status,
                'message' => $message
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
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.contact-list')->with($data);
    }

    public function emailTemplates() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.email-template')->with($data);
    }

    public function composeEmail() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('admin.email-compose')->with($data);
    }

    public function sendComposedEmail(Request $request) {
        if ($request->ajax()) {
    
            $ctaArray = $request->formData['hasCTA'] ? 
                [ 
                    'link' => $request->formData['ctaURL'],
                    'label' => $request->formData['ctaText']
                ] : null;

            switch ($request->formData['type']) {
                case 'bulk email':
                    $result = Email::initializeEmail([
                        'message' => $request->formData['message'],
                        'subject' => $request->formData['subject'],
                        'callToAction' => $ctaArray,
                        'params' => $request->formData['emailParameters']
                    ])->sendToAllContacts();
                    dd($result);
                    break;

                case 'selected email list':
                    $result = Email::initializeEmail([
                        'message' => $request->formData['message'],
                        'subject' => $request->formData['subject'],
                        'callToAction' => $ctaArray,
                        'params' => $request->formData['emailParameters'],
                        'contactList' => $request->formData['contactList']
                    ])->sendToSelectedContacts();
                    break;
                
                default:
                    $result = Email::initializeEmail([
                        'message' => $request->formData['message'],
                        'subject' => $request->formData['subject'],
                        'callToAction' => $ctaArray,
                        'params' => $request->formData['emailParameters'],
                        'email' => $request->formData['contactList']
                    ])->sendToAnEmailAddress();
                    break;
            }
        }
    }

    // public function sendTestEmail(Request $request) {
    //     if ($request->ajax()) {
    //         $result = Email::initializeEmail([
    //             'name' => 'John Doe',
    //             'ref_code' => '10AKCMS-39GHI121'
    //         ])->welcomeEmail();

    //         dd($result);
    //     }
    // } 
}
