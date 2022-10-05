@php
    $html_tag_data = [];
    $title = 'Logo List';
    $description= 'Logo List for Admin';
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
                  <h1 class="mb-0 pb-0 display-4" id="title">Logo List</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('admin.logos')}}">Logos</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <!-- Add New Button Start -->
                  <a href="{{route('admin.addEdit.logo')}}"><button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                    <i data-acorn-icon="plus"></i>
                    <span>Add New</span>
                  </button></a>
                  <!-- Add New Button End -->
                </div>
                <!-- Top Buttons End -->
              </div>
            </div>
            <!-- Title and Top Buttons End -->

            <!-- Content Start -->
            <div class="data-table-rows slim">
              <!-- Controls Start -->
             
              <!-- Controls End -->

              <!-- Table Start -->
              <div class="data-table-responsive-wrapper">
                <table id="skill" class="data-table nowrap hover">
                  <thead>
                    <tr>
                      <th class="text-muted text-small text-uppercase" width="10%">ID</th>
                      <th class="text-muted text-small text-uppercase">Logo</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Status</th>
                      <th class="text-muted text-small text-uppercase" width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($logos->count()>0)
                      @foreach($logos as $key=>$logo)
                      <tr>
                          <td>{{$key+1}}</td>
                          <td><img src="{{asset($logo['image'])}}" alt="" width="50" height="50"></td>
                          <td>
                            @if($logo->status ==1)
                              <a class="updateLogoStatus" id="logo-{{$logo->id}}" logo_id="{{$logo->id}}" href="javascript:void(0)">Active</a>  
                            @else
                              <a class="updateLogoStatus" id="logo-{{$logo->id}}" logo_id="{{$logo->id}}" href="javascript:void(0)">Inactive</a>  
                            @endif
                          </td>
                          <td>
                            <a href="{{route('admin.addEdit.logo',$logo['id'] )}}"><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a> 
                            <a class="confirmDelete" record="logo" recoedid="{{$logo->id}}" href="javascript:void('0')"><button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button></a>
                          </td>
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
    $('#skill').DataTable();
} );
</script>
@endsection