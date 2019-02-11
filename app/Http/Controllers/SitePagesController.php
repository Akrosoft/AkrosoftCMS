<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SitePage;
use App\SiteMenu;
use App\Template;
use App\TemplateElement;
use App\TemplateElementAttribute;
use App\TemplateElementCategory;
use App\SiteSettingsCategory;
use App\SitePageSettingCollection;
use App\SitePageSetting;
use App\SelectedElementAttributes;
use App\SiteAttribute;

class SitePagesController extends Controller
{
    public static function getHomePage() {
        return static::getSitePageContents(1);
    }

    public static function getPageBySlug() {
        $random = static::getRandomNumber();
        return static::getSitePageContents($random);
    }

    public static function getSitePageContents($page_id) {
        switch($page_id) {
            case 1:
                return "Home Page";
                break;
            case 2:
                return "About Us Page";
                break;
            case 3:
                return "Services Page";
                break;
            case 4:
                return "Portfolio Page";
                break;
            case 5:
                return "Contact Us Page";
                break;
            default:
                return "error";
                break; 
        }
    }

    public static function getRandomNumber() {
        return mt_rand(0, 9);
    }

    public static function getSitePages() {
        return SitePage::getAllSitePages();
    }

    public static function getSitePageBySlug($page_slug) {
        return SitePage::getSitePageBySlug($page_slug);
    }

    public static function createSitePage($formData) {
        $page = new SitePage;
        $page->title = $formData['create_page_title'];
        $page->slug = $formData['create_page_slug'];
        $page->header_title = $formData['page_header_title'];
        $page->meta_tag = $formData['meta_tag'];
        $page->meta_description = $formData['meta_desc'];

        return $page->save();
    }

    public static function createSiteMenu($formData) {
        $menu = new SiteMenu;
        $menu->page_id = $formData['menu_page'];
        $menu->label = $formData['menu_label'];
        $menu->parent_id = $formData['menu_id'] ? $formData['menu_id'] : 0;
        $menu->url = $formData['menu_url'];
        $menu->order = $formData['menu_order'];

        return $menu->save();
    }

    public static function getSiteFooter($id) {

    }

    public static function getSiteMenu($id) {

    }

    public static function getSitePageSetupCategoy() {
        return SiteSettingsCategory::getAllSiteSettingsCategory();
    } 

    public static function getSitePageSetupCollections() {
        return SitePageSettingCollection::getAllSitePageSettingsCollection();
    } 

    public static function getAllSiteTemplates() {
        return Template::getAllTemplates();
    }

    public static function getAllSiteTemplateElements() {
        return TemplateElement::getAllTemplateElements();
    }
    public static function getAllSiteTemplateElementAttributes() {
        return TemplateElementAttribute::getAllTemplateElementAttributes();
    }
    public static function getAllSiteTemplateElementCategories() {
        return TemplateElementCategory::getAllTemplateElementCategories();
    }

    public static function getAllSiteMenus() {
        return SiteMenu::getAllMenus();
    }

    public static function getAllSiteTemplateSettings() {
        return SitePageSetting::getPageSettings();
    }

    public static function getSiteTemplateSetting() {
        return SitePageSetting::getPageTemplateSetting();
    }

    public static function getSiteTemplateMenuSetting() {
        return SitePageSetting::getPageTemplateMenuSetting();
    }

    public static function getSiteTemplateFooterSetting() {
        return SitePageSetting::getPageTemplateFooterSetting();
    }

    public static function updatePagesSettingsLinks($formData) {
        $attribute = SelectedElementAttributes::where('attribute_id' , $formData['attribute_id'])->where('target_id', $formData['menu_id'])->get();
        
        if ($attribute->isEmpty()) {
            $attribute = new SelectedElementAttributes;
            $attribute->attribute_id = $formData['attribute_id'];
            $attribute->target_id = $formData['menu_id'];
            
            return $attribute->save();
        }
        return false;
    }

    public static function getSelectedAttributeLinks($attribute_id) {
        return SelectedElementAttributes::getSelectedAttributes($attribute_id);
    }

    public static function getAllSiteTemplateElementAttributesManualLinks() {
        return SelectedElementAttributes::getAllSelectedAttributes();
    }

    public static function getAutoConfigureTemplateAttributes() {
        $data = [
            'menu' => SiteMenu::isSiteMenuConfigured(),
            'social_media' => SiteAttribute::isClientSocialMediaConfigured(),
            'copyright' => SiteAttribute::isCopyRightInfoSet(),
            'logo' => SiteAttribute::isClientLogoSet(),
            'contact_info' => SiteAttribute::isContactInfoSet()
        ];

        return $data;
    }

    public static function updateSiteThemeSettings($formData) {
        $is_success_update = true;
        $template = SitePageSetting::getPageTemplateSetting();
        $template_menu = SitePageSetting::getPageTemplateMenuSetting();
        $template_footer = SitePageSetting::getPageTemplateFooterSetting();

        $template->previous = $template->value;
        $template->value = $formData['template'];
        if (!$template->save()) {
            $is_success_update = false;
            return $is_success_update;
        }

        $template_menu->previous = $template_menu->value;
        $template_menu->value = $formData['menu'];
        if (!$template_menu->save()) {
            $is_success_update = false;
            return $is_success_update;
        }

        $template_footer->previous = $template_footer->value;
        $template_footer->value = $formData['footer'];
        if (!$template_footer->save()) {
            $is_success_update = false;
            return $is_success_update;
        }

        $selected_element_attributes = SelectedElementAttributes::getAllSelectedAttributes();

        if ($selected_element_attributes->isNotEmpty()) {
            foreach($selected_element_attributes as $attribute) {
                $attribute->delete();
            }
        }

        return $is_success_update;
    }

    public static function getPageMenu() {
        $menu_element_id = SitePageSetting::getPageTemplateMenuSetting();
        $element = TemplateElement::getTemplateElementByID($menu_element_id->value);

        switch($element->name) {
            case 'mono_absolute_fixed_menu':
                $data = [
                    'element' => $element,
                    'main_menus' => SiteMenu::getAllMainMenus(),
                    'sub_menus' => SiteMenu::getAllSubMenus()
                ];
                break;

            case 'mono_header_sticky_menu':
                $data = [
                    'element' => $element,
                    'main_menus' => SiteMenu::getAllMainMenus(),
                    'sub_menus' => SiteMenu::getAllSubMenus(),
                    'mini_menu' => SelectedElementAttributes::getSelectedAttributes(15)
                ];
                break;

            case 'canvas_default_menu':
                $data = [
                    'element' => $element,
                    'main_menus' => SiteMenu::getAllMainMenus(),
                    'sub_menus' => SiteMenu::getAllSubMenus()
                ];
                break;

            default:
                dd('Menu element does NOT exist!!!');
                break;
        }
        return (object)$data;
    }

    public static function getPageFooter() {
        $footer_element_id = SitePageSetting::getPageTemplateFooterSetting();
        $element = TemplateElement::getTemplateElementByID($footer_element_id->value);

        switch($element->name) {
            case 'mono_classic_footer':
                $data = [
                    'element' => $element,
                    'logo' => SiteAttribute::getClientShortName(),
                    'useful_links' => SelectedElementAttributes::getSelectedAttributes(2),
                    'additional_links' => SelectedElementAttributes::getSelectedAttributes(3),
                    'social_media' => SiteAttribute::getClientSocialMediaAccounts(),
                    'contact_info' => SiteAttribute::getContactInfo(),
                    'copy_right' => SiteAttribute::getClientCopyRight()
                ];
                break;

            case 'mono_clean_footer':
                $data = [
                    'element' => $element,
                    'logo' => SiteAttribute::getClientShortName(),
                    'social_media' => SiteAttribute::getClientSocialMediaAccounts(),
                    'menu_links' => SelectedElementAttributes::getSelectedAttributes(13),
                    'copy_right' => SiteAttribute::getClientCopyRight()
                ];
                break;

            case 'mono_logo_footer':
                $data = [
                    'element' => $element,
                    'logo' => SiteAttribute::getClientShortName(),
                    'social_media' => SiteAttribute::getClientSocialMediaAccounts(),
                    'copy_right' => SiteAttribute::getClientCopyRight()
                ];
                break;

            case 'canvas_default':
                $data = [
                    'element' => $element,
                    'logo' => SiteAttribute::getClientLogo(),
                    'social_media' => SiteAttribute::getClientSocialMediaAccounts(),
                    'copy_right' => SiteAttribute::getClientCopyRight(),
                    'menu_links' => SelectedElementAttributes::getSelectedAttributes(22),
                    'contact_info' => SiteAttribute::getContactInfo(),
                    'terms_policy_links' => SelectedElementAttributes::getSelectedAttributes(19),
                ];
                break;

            case 'canvas_simple_footer':
                $data = [
                    'element' => $element,
                    'logo' => SiteAttribute::getClientLogo(),
                    'social_media' => SiteAttribute::getClientSocialMediaAccounts(),
                    'copy_right' => SiteAttribute::getClientCopyRight(),
                    'menu_links' => SelectedElementAttributes::getSelectedAttributes(26)
                ];
                break;

            case 'canvas_sticky_footer':
                $data = [
                    'element' => $element,
                    'logo' => SiteAttribute::getClientLogo(),
                    'social_media' => SiteAttribute::getClientSocialMediaAccounts(),
                    'copy_right' => SiteAttribute::getClientCopyRight(),
                    'menu_links' => SelectedElementAttributes::getSelectedAttributes(30)
                ];
                break;

            default:
                dd('Footer element does NOT exist!!!');
                break;
        }
        return (object)$data;
    }
}
