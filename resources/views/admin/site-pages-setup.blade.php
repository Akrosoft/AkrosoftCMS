@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Site Pages Setup</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                <span>Manager&nbsp;>&nbsp;</span>Site Pages Setup
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="" style="text-align: right;">
                  {{-- <a role="button" href="#addAttributeImage"  style="margin-top: 10px;" class="btn btn-rounded btn-outline-success" data-toggle="modal">Add Logo</a> --}}
                </p>
              </div>
              <div class="summary--item"> 
                <p class="">
                  {{-- <a role="button" href="#addSiteAttributeModal"  style="margin-top: 10px;" class="btn btn-rounded btn-outline-success" data-toggle="modal">Add Site Attribute</a> --}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <section class="main--content">
      <form action="#" id="site_attribute_edit_form" method="POST">
      <div class="row"> 
        @if ($setting_categories->isNotEmpty())
        @foreach($setting_categories as $setting_category)
          <div class="container-fluid bg-white" style="margin-botton: 5px;">
            <h2 class="h3" style="width: 100%; color: #e16123; margin: 10px 0;">{{ $setting_category->name }}</h2>
              <div class="row">
                @if($setting_category->id == 1)
                @foreach($setting_collections as $collection)
                  @if($collection->category_id == $setting_category->id)
                    <div class="col-md-6 offset-md-3">
                      <div class="form-group">
                        <label> 
                          <span class="label-text">{{ $collection->label }}</span>
                          <select  class="form-control" id="{{ $collection->name }}" name="{{  $collection->name }}">
                            @foreach($templates as $template)
                              <option value="{{$template->id}}" {{$template->id == $template_setting->value ? 'selected' : ''}}>{{ ucwords($template->name) }} Theme</option>
                            @endforeach
                          </select>
                        </label> 
                      </div>
                    </div>
                  @endif
                @endforeach
                @else
                @foreach($setting_collections as $collection)
                  @if($collection->category_id == $setting_category->id)
                    <div class="col-md-6 offset-md-3">
                      @php
                        $templateItem = $collection->category_id == 2 ? $template_menu_setting->value : $template_footer_setting->value;
                        $auto_label = "Generic Site Attributes";
                        $manual_menu = "Custom Menu Attribute";
                        $manual_footer = "Custom Footer Attributes";
                      @endphp
                      <div class="form-group">
                        <label> 
                          <span class="label-text">{{ $collection->label }}</span>
                          <select  class="form-control" id="{{ $collection->name }}" name="{{  $collection->name }}">
                            @foreach($template_elements as $element)
                              @if($element->template_id == $template_setting->value && $element->category_id == ($collection->category_id - 1))
                                <option value="{{$element->id}}" {{ $templateItem == $element->id ? "selected" : ""}}>{{ ucwords($element->label) }} Theme</option>
                              @endif
                            @endforeach
                          </select>
                        </label> 
                      </div>
                    </div>
                    <div class="col-md-10 offset-md-1" id="{{ $collection->name . '_container' }}" name="{{ $collection->name . '_container' }}">
                        <div class="container-fluid">
                            <div class="row">
                                <div id="{{ $collection->name . '_manual_attributes' }}" name="{{ $collection->name . '_manual_attributes' }}" class="col-md-7">
                                  <div class="panel-content" style="border: none;"> 
                                    <div class="panel-subtitle"> 
                                        <h5 class="h5 text-uppercase">{{ $collection->category_id == 2 ? $manual_menu : $manual_footer }}</h5> 
                                    </div>
                                    @foreach($template_elements as $element)
                                    @if($element->id == $templateItem)
                                      @foreach($element->elementAttributes as $index => $attribute)
                                      @if($attribute->configuration == 'manual')
                                      <ul class="nav nav-tabs"> 
                                        <li class="nav-item"> 
                                            <a href="{{ '#tab0' . $index }}" data-toggle="tab" class="nav-link active bg-success text-white"><strong>{{ $attribute->label }}</strong></a> 
                                        </li>
                                    </ul> 
                                    <div class="tab-content"> 
                                      <div class="tab-pane fade show active" id="{{ '#tab0' . $index }}">
                                        <div class="col-md-10 offset-md-1">
                                          <div class="row">
                                            <div class="col-md-8">
                                              <div class="form-group">
                                                <select  class="form-control" id="{{ $attribute->name . '_select'}}" name="{{ $attribute->name . '_select'}}">
                                                  <option selected hidden value="">-- Select Menu to Link --</option>
                                                  @if($menus->isNotEmpty())
                                                    @foreach($menus as $menu)
                                                      <option value="{{ $menu->id }}">{{ $menu->label }}</option>
                                                    @endforeach
                                                  @endif
                                                </select>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                              <button id="{{ $attribute->name . '_btn'}}" name="{{ $attribute->name . '_btn'}}" class="btn btn-rounded btn-success btn-block" data-action="update links" data-attribute_id="{{ $attribute->id }}">Add Link</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <h5 class="h5 text-uppercase text-success"><strong style="text-decoration: underline;">Links</strong></h5> 
            
                                        <ul class="list-group" id="{{ $attribute->name . '_links'}}" name="{{ $attribute->name . '_links'}}" style="border: none;">
                                          @if($manual_attribute_links->isNotEmpty())
                                            @foreach($manual_attribute_links as $link)
                                              @if($link->attribute_id == $attribute->id)
                                                <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none;">
                                                  <strong>{{ $link->menu->label }}</strong>
                                                  <a href="#" class="btn btn-rounded btn-sm btn-danger" data-attribute_label="{{ $attribute->label }}" data-delete_factor="delete-site-attribute-link" data-target_id="{{ $link->id }}">
                                                    Delete &nbsp; <i class="far fa-times-circle"></i>
                                                  </a>
                                                </li>
                                              @endif
                                            @endforeach
                                          @endif
                                        </ul> 
                                      </div>
                                    </div><br />
                                      @endif
                                      @endforeach
                                    @endif
                                    @endforeach
                                  </div>
                                </div>
                              <div id="{{ $collection->name . '_auto_attributes' }}" name="{{ $collection->name . '_auto_attributes' }}" class="col-md-5">
                                <div class="panel-content" style="border: none;"> 
                                  <div class="panel-subtitle"> 
                                    <h5 class="h5 text-uppercase">{{ $auto_label }}</h5> 
                                  </div>
                                  <ul class="list-group"> 
                                  @foreach($template_elements as $element)
                                    @if($element->id == $templateItem)
                                      @foreach($element->elementAttributes as $attribute)
                                      @if($attribute->configuration == 'auto')
                                        @if(in_array($attribute->target, $auto_attributes))
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>{{$attribute->label}}</strong>
                                            <span class="{{ $auto_attributes[$attribute->target] ? __('text-success') : __('text-danger')}}">
                                              {!! $auto_attributes[$attribute->target] ? '<i class="far fa-check-circle"></i>' : '<i class="far fa-times-circle"></i>'!!}
                                            </span>
                                          </li>
                                        @else
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>{{$attribute->label}}</strong>
                                            <span class="{{__('text-danger')}}">
                                              <i class="far fa-times-circle"></i>
                                            </span>
                                          </li>
                                        @endif
                                      @endif
                                      @endforeach
                                    @endif
                                    @endforeach
                                  </ul>
                                </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <br>
                  @endif
                @endforeach
                @endif
              </div>
            </div>
        @endforeach
        @else
        @endif   
      </div>
      <div id="save_template_setting_btn_container" class="row mt-3" style="display: none;">
        <div class="form-group ml-auto" style="text-align: right;">
          <button id="save_template_setting_btn" class="btn btn-rounded btn-success btn-lg">Save Template Settings</button>
        </div>
      </div>
    </form>
    </section>  
@endsection