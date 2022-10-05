@php
    $html_tag_data = [];
    $title = 'Email List';
    $description= 'Email List for Admin';
@endphp
@extends('layouts.admin_layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<main>
    <div class="container">
      <div class="row">
        <!-- Menu Start -->
        @include('layouts.admin_layouts.sitebar')
        <!-- Menu End -->

        <!-- Page Content Start -->
        <div class="col">
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
              <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                  <h1 class="mb-0 pb-0 display-4" id="title">Email List</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('admin.logos')}}">Emails</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
               
                <!-- Top Buttons End -->
              </div>
            </div>
            <!-- Title and Top Buttons End -->

            <!-- Content Start -->
            <div class="data-table-rows slim">
              <!-- Controls Start -->
             
              <!-- Controls End -->
              <h1 class="mb-0 pb-0 display-4 text-center">Unseen Email</h1>
              <hr>
              <!-- Table Start -->
              <div class="data-table-responsive-wrapper">
                <table id="unseenContact" class="data-table nowrap hover">
                  <thead>
                    <tr>
                      <th class="text-muted text-small text-uppercase" width="10%">ID</th>
                      <th class="text-muted text-small text-uppercase">Name</th>
                      <th class="text-muted text-small text-uppercase">Email</th>
                      <th class="text-muted text-small text-uppercase">Subject</th>
                      <th class="text-muted text-small text-uppercase" width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($unseenContacts->count()>0)
                      @foreach($unseenContacts as $key=>$contact)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$contact['name']}}</td>
                            <td>{{$contact['email']}}</td>
                            <td>{{$contact['subject']}}</td>
                            <td><a href="{{route('admin.contact.view',$contact['id'])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a> <a class="confirmDelete" record="contact" recoedid="{{$contact->id}}" href="javascript:void('0')"><button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button></a></td>
                        </tr>
                      @endforeach
                    @endif 
                </tbody>
                </table>
              </div>
              <hr>
              <h1 class="mb-0 pb-0 display-4 text-center">Seen Email</h1>
              <hr>
              <div class="data-table-responsive-wrapper">
                <table id="seenContact" class="data-table nowrap hover">
                  <thead>
                    <tr>
                      <th class="text-muted text-small text-uppercase" width="10%">ID</th>
                      <th class="text-muted text-small text-uppercase">Name</th>
                      <th class="text-muted text-small text-uppercase">Email</th>
                      <th class="text-muted text-small text-uppercase">Subject</th>
                      <th class="text-muted text-small text-uppercase" width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($seenContacts->count()>0)
                      @foreach($seenContacts as $key=>$contact)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$contact['name']}}</td>
                            <td>{{$contact['email']}}</td>
                            <td>{{$contact['subject']}}</td>
                            <td><a href="{{route('admin.contact.view',$contact['id'])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a> <a class="confirmDelete" record="contact" recoedid="{{$contact->id}}" href="javascript:void('0')"><button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button></a></td>
                        </tr>
                      @endforeach
                    @endif 
                </tbody>
                </table>
              </div>
              <!-- Table End -->
            </div>
            <!-- Content End -->

            
          </div>
        <!-- Page Content End -->
      </div>
    </div>
  </main>
@endsection
 @section("script_js")
<script>
$(document).ready( function () {
    $('#unseenContact').DataTable();
    $('#seenContact').DataTable();
} );
</script>
@endsection