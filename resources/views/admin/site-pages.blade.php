@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Site Pages</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                <span>Manager&nbsp;>&nbsp;</span>Site Pages
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="">
                  <a id="create_site_page_btn" role="button" href="#createSitePageModal" style="margin-top: 10px;" class="btn btn-rounded btn-outline-success" data-toggle="modal">Create Site Page</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 
    
    @if($pages->isEmpty())
    <section class="main--content"> 
        <div class="row gutter-20">
          <div style="text-align: center; width: 100%; position: relative; margin-top: 100px;">
            <h1 style="text-align: center; width: 100%;">
              Site Page is <strong>empty</strong>.
            </h1>
            <a class="btn btn-rounded btn-success" href="#">Create Site Page</a>
          </div>  
      </div>
    </section>   
    @else
    <section class="main--content">
        <div class="panel"> 
          <div class="records--list"> 
            <div id="recordsListView_wrapper" class="dataTables_wrapper no-footer">
              <div class="table-responsive">
                  <table id="recordsListView" class="dataTable no-footer" aria-describedby="recordsListView_info" role="grid"> 
                    <thead> 
                      <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1"style="width: 2%;">
                          #
                        </th>
                        <th class="not-sortable sorting_disabled" rowspan="1" colspan="1" aria-label="Image" style="width: 15%;">
                          Page Title
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 15%;">
                          Slug
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 15%">
                          Header Title
                        </th>
                        <th class="not-sortable sorting_disabled" rowspan="1" colspan="1" style="width: 53%; text-align: center;">
                          Actions
                        </th>
                      </tr>
                    </thead> 
                    <tbody>
                      @foreach($pages as $index=>$page)
                      <tr role="row" class="odd"> 
                          <td> 
                            {{ $index + 1 }} 
                          </td>
                          <td> 
                            {{ $page->title }}
                          </td>
                          <td> 
                            {{ $page->slug }}
                          </td>
                          <td>
                            {{ $page->header_title }}
                          </td>
                          <td> 
                            <div class="dropleft" style="text-align: right;"> 
                                <a href="#" class="btn btn-rounded btn-outline-primary btn-sm">Edit</a>
                                <a href="/manager/site-pages/{{$page->slug}}/manage" class="btn btn-rounded btn-outline-warning btn-sm">Manage Content</a>
                                <a href="/manager/site-pages/{{$page->slug}}/preview" class="btn btn-rounded btn-outline-primary btn-sm">Preview</a>  
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
        </section>
    @endif
@endsection