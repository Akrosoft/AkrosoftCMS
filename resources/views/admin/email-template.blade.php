@extends('layouts.admin')

@section('content')
    <section class="page--header"> 
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-lg-6"> 
            <h2 class="page--title h5">Email Template</h2> 
            <ul class="breadcrumb"> 
              <li class="breadcrumb-item active">
                  <span>Manager&nbsp;>&nbsp;</span>Email Manager&nbsp;>&nbsp;</span>Template
              </li>
            </ul> 
          </div>

          <div class="col-lg-6"> 
            <div class="summary--widget"> 
              <div class="summary--item"> 
                <p class="">
                  <a role="button" href="#addEmailTemplateModal" style="margin-top: 10px;" class="btn btn-rounded btn-outline-success" data-toggle="modal">Add Template</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 

    @if($emailTemplate->isEmpty())
    <section class="main--content"> 
        <div class="row gutter-20">
          <div style="text-align: center; width: 100%; position: relative; margin-top: 100px;">
            <h1 style="text-align: center; width: 100%;">
              Email Template List is <strong>empty</strong>.
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
                        <th class="not-sortable sorting_disabled" rowspan="1" colspan="1" aria-label="Image" style="width: 18%;">
                          Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 18%;">
                          Subject
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1" style="width: 27%">
                          Message
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="recordsListView" rowspan="1" colspan="1"  style="width: 15%">
                          Parameters
                        </th>
                        <th class="not-sortable sorting_disabled" rowspan="1" colspan="1" style="width: 20%; text-align: center;">
                          Actions
                        </th>
                      </tr>
                    </thead> 
                    <tbody>
                      @foreach($emailTemplate as $index=>$template)
                      <tr role="row" class="odd"> 
                          <td> 
                            {{ $index + 1 }} 
                          </td>
                          <td> 
                            {{ $template->name }}
                          </td>
                          <td> 
                            {{ $template->subject }}
                          </td>
                          <td> 
                            {{ $template->message }}
                          </td>
                          <td>
                            {{ trim(implode(', ', $template->params), ', ') }}
                          </td>
                          <td> 
                            <div class="dropleft" style="text-align: right;"> 
                                <a href="#addEmailTemplateModal" class="btn btn-rounded btn-outline-primary btn-sm" id="{{ $template->id }}" data-toggle="modal" data-request="edit_email_template">View</a> 
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