@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Contact List</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                  <span>Manager&nbsp;>&nbsp;</span>Contact List
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                
              </div>

              <div class="summary--item"> 
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

          @if($contacts->isEmpty())
          <section class="main--content"> 
              <div class="row gutter-20">
                <div style="text-align: center; width: 100%; position: relative; margin-top: 100px;">
                  <h1 style="text-align: center; width: 100%;">
                    Contact List is <strong>empty</strong>.
                  </h1>
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
                              <th class="not-sortable sorting_disabled" rowspan="1" colspan="1" aria-label="Image" style="width: 20%;">
                                Full Name
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 25%;">
                                Email
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 18%">
                                Subject
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1"  style="width: 15%">
                                Response status
                              </th>
                              <th class="not-sortable sorting_disabled" rowspan="1" colspan="1" style="width: 20%; text-align: center;">
                                Actions
                              </th>
                            </tr>
                          </thead> 
                          <tbody>
                            @foreach($contacts as $index=>$contact)
                            <tr role="row" class="odd"> 
                                <td> 
                                  {{ $index + 1 }} 
                                </td>
                                <td> 
                                  {{ $contact->fullname }}
                                </td>
                                <td> 
                                  {{ $contact->email }}
                                </td>
                                <td> 
                                  {{ isset($contact->subject) ? $contact->subject : "..."}}
                                </td>
                                <td>
                                  {{ $contact->responseID->response }}
                                </td>
                                <td> 
                                  <div class="dropleft" style="text-align: right;"> 
                                      <a href="#viewContactMessageModal" class="btn btn-rounded btn-outline-primary btn-sm view-contact-btn" id="{{ $contact->id }}" data-toggle="modal" data-request="contact_message">View</a> 
                                      <a href="#" class="btn btn-rounded btn-outline-danger btn-sm" id="{{ $contact->id }}" data-request="delete_contact" data-delete_factor="delete-contact">Delete</a> 
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