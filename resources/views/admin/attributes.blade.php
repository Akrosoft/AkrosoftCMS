@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Attributes</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                <span>Manager&nbsp;>&nbsp;</span>Attributes
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="" style="text-align: right;">
                  <a role="button" href="#addAttributeImage"  style="margin-top: 10px;" class="btn btn-rounded btn-outline-success" data-toggle="modal">Add Logo</a>
                </p>
              </div>
              <div class="summary--item"> 
                <p class="">
                  <a role="button" href="#addSiteAttributeModal"  style="margin-top: 10px;" class="btn btn-rounded btn-outline-success" data-toggle="modal">Add Site Attribute</a>
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
        @if ($attributeCategories->isNotEmpty())
        @foreach($attributeCategories as $attributeCategory)
          <div class="container-fluid bg-white" style="margin-botton: 5px;">
            <h2 class="h3" style="width: 100%; color: #e16123; margin: 10px 0;">{{ $attributeCategory->name }}</h2>
              <div class="row">
                  @if($basicCount == 0 && $attributeCategory->id == 1)
                    <div style="text-align: center; width: 100%; position: relative; margin: 30px 0 50px;">
                      <h4 class="h5" style="text-align: center; width: 100%;">
                          {{ $attributeCategory->name }} attribute category is <strong>empty</strong>.
                      </h4>
                    </div>
                  @elseif($socialMediaCount == 0 && $attributeCategory->id == 2)
                    <div style="text-align: center; width: 100%; position: relative; margin: 30px 0 50px;">
                      <h4 class="h5" style="text-align: center; width: 100%;">
                          {{ $attributeCategory->name }} attribute category is <strong>empty</strong>.
                      </h4>
                    </div>
                  @elseif($customCount == 0 && $attributeCategory->id == 3)
                    <div style="text-align: center; width: 100%; position: relative; margin: 30px 0 50px;">
                      <h4 class="h5" style="text-align: center; width: 100%;">
                          {{ $attributeCategory->name }} attribute category is <strong>empty</strong>.
                      </h4>
                    </div>
                  @elseif($customCount == 0 && $attributeCategory->id == 4)
                    <div style="text-align: center; width: 100%; position: relative; margin: 30px 0 50px;">
                      <h4 class="h5" style="text-align: center; width: 100%;">
                          {{ $attributeCategory->name }} attribute category is <strong>empty</strong>.
                      </h4>
                    </div>
                  @endif
                @foreach($siteAttributes as $siteAttribute)
                @if($attributeCategory->id == $siteAttribute->attributeCollection->category_id)
                  <div class="col-md-4"> 
                    <div class="site-attribute" style="position: relative; width:95%; margin: 10px auto; padding: 10px; border: 1px solid #ffffff;">
                      <a id="{{ $siteAttribute->id }}" class="delete-site-attribute" href="#" style="position: absolute; top: 10px; right: 10px; display: none;" data-delete_factor="site-attribute"><i class="fa fa-times-circle"></i></a>
                      <div class="form-group"> 
                        <label> 
                            <span style="color: {{ $siteAttribute->attributeCollection->color }}">{!! $siteAttribute->attributeCollection->icon !!}</span>
                          <span class="label-text">{{ $siteAttribute->attributeCollection->category_id == 3 ? $siteAttribute->otherLabel->label : $siteAttribute->attributeCollection->label }}</span> 
                          <input type="text" id="{{ $siteAttribute->id }}" name="{{ $siteAttribute->id }}" value="{{ $siteAttribute->value }}" placeholder="Akrosoft Inc." class="form-control" required data-attr_id="{{ $siteAttribute->id }}"> 
                        </label> 
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach
              </div>
            </div>
            <br><br>
        @endforeach
        @if($basicCount > 0 || $socialMediaCount > 0 || $customCount > 0)
          <div class="col-md-4" id="save_site_attribute" style="display: none;"> 
            <div style="position: relative; width:95%; margin: 10px auto 30px;">
              <div class="form-group"> 
                <a id="save_all_edited_site_attr" role="button" href="#" style="margin-top: 30px;" class="btn btn-rounded btn-lg btn-success"><i class="far fa-save"></i>&nbsp;Save</a>
              </div>
            </div>
          </div>
        @endif
        {{--  
          Show all uploaded images
        --}}
        <div class="container-fluid bg-white" style="margin-botton: 30px; margin-top: 30px;">
          <h2 class="h3" style="width: 100%; color: #e16123; margin: 10px 0;">{{ 'Uploaded Images' }}</h2>
            <div class="row">
              @if($attributeImages->isNotEmpty())
              @foreach($attributeImages as $image)
              <div class="col-md-3" title="{{ $image->label. ": " . $image->image_ref }}"> 
                <div class="site-attribute" style="position: relative; width:95%; margin: 10px auto; padding: 10px; border: 1px solid #ffffff;">
                  <a id="{{$image->id}}" class="delete-site-attribute" href="#" style="position: absolute; top: 10px; right: 10px; display: none;" data-delete_factor="image-attribute"><i class="fa fa-times-circle"></i></a>
                  <div class="form-group" style="text-align: center;"> 
                    <label> 
                        <div style="text-align: left;">
                          <span class="label-text">{{ $image->label }}</span>
                        </div> 
                      <img  id="" name="" src="{{ asset($image->image_ref) }}"  alt="{{'Image for test'}}" required data-attr_id="" style="width: 70%; border: 1px solid #ffffff; border-radius: 8px;"> 
                    </label> 
                  </div>
                </div>
              </div>
              @endforeach
              @else

              @endif
            </div>
          </div>
        {{--  
          Endd uploaded images showed
        --}}
        @else
          <div style="text-align: center; width: 100%; position: relative; margin-top: 100px;">
            <h1 style="text-align: center; width: 100%;">
              Site Attribute List is <strong>empty</strong>.
            </h1>
            <a class="btn btn-rounded btn-success" href="#largeModal" data-toggle="modal">Add Site Attribute</a>
          </div>
        @endif   
      </div>
    </form>
    </section>  
@endsection