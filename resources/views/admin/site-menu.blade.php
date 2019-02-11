@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Site Menu</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                <span>Manager&nbsp;>&nbsp;</span>Site Menu
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="">
                  <a id="add_site_menu_btn" role="button" href="#addSiteMenuModal" style="margin-top: 10px;" class="btn btn-rounded btn-outline-success" data-toggle="modal">Add Menu</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

    <section class="main--content"> 
        <div class="panel"> 
            <div class="records--list"> 
              <div id="recordsListView_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-responsive">
                    <table id="recordsListView" class="dataTable no-footer" aria-describedby="recordsListView_info" role="grid"> 
                      <thead> 
                        <tr role="row">
                          <th class="" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1"style="width: 2%;">
                            #
                          </th>
                          <th class="" rowspan="1" colspan="1" aria-label="Image" style="width: 10%;">
                            Menu Page
                          </th>
                          <th class="" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 10%;">
                            Menu Label
                          </th>
                          <th class="" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 15%">
                            Page Slug
                          </th>
                          <th class="" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 10%">
                            Menu Type
                          </th>
                          <th class="" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 20%">
                            URL
                          </th>
                          <th class="" rowspan="1" colspan="1" style="width: 5%; text-align: center;">
                            Order
                          </th>
                          <th class="" rowspan="1" colspan="1" style="width: 8%; text-align: center;">
                            status
                          </th>
                          <th class="" rowspan="1" colspan="1" style="width: 20%; text-align: center;">
                            action
                          </th>
                        </tr>
                      </thead> 
                      <tbody>
                        @foreach($menus as $index=>$menu)
                        <tr role="row" class="odd"> 
                            <td> 
                              {{ $index + 1 }} 
                            </td>
                            <td> 
                              {{ $menu->page->title }}
                            </td>
                            <td> 
                              {{ $menu->label }}
                            </td>
                            <td>
                              {{ $menu->page->slug }}
                            </td>
                            <td>
                              {{ isset($menu->parent_id) && $menu->parent_id > 0 ? "Sub menu" : "Main menu" }}
                            </td>
                            <td>
                              {{ $menu->url }}
                            </td>
                            <td>
                              {{ $menu->order }}
                            </td>
                            <td>
                              {{ $menu->page->published ? "Enabled" : "Disabled" }}
                            </td>
                            <td> 
                              <div class="dropleft" style="text-align: right;"> 
                                  <a href="#" class="btn btn-rounded btn-outline-primary btn-sm">Edit</a>
                                  <a href="#" class="btn btn-rounded btn-outline-danger btn-sm">Delete</a>  
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
@endsection