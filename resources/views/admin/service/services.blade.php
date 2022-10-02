@php
    $html_tag_data = [];
    $title = 'Service';
    $description= 'Service for Admin';
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
                  <h1 class="mb-0 pb-0 display-4" id="title">Service List</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('admin.services')}}">Services</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <!-- Add New Button Start -->
                  <a href="{{route('admin.addEdit.service')}}"><button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
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
                <table id="service" class="data-table nowrap hover">
                  <thead>
                    <tr>
                      <th class="text-muted text-small text-uppercase" width="10%">ID</th>
                      <th class="text-muted text-small text-uppercase">Title</th>
                      <th class="text-muted text-small text-uppercase" width="40%">Description</th>
                      <th class="text-muted text-small text-uppercase" width="10%">Status</th>
                      <th class="text-muted text-small text-uppercase" width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($services->count()>0)
                    @foreach ($services as $key=>$service)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$service['title']}}</td>
                        <td>{{ \Illuminate\Support\Str::limit($service['description'], 20, $end='...') }}</td>
                        <td>
                          @if($service->status ==1)
                            <a class="updateServiceStatus" id="service-{{$service->id}}" service_id="{{$service->id}}" href="javascript:void(0)">Active</a>  
                          @else
                            <a class="updateServiceStatus" id="service-{{$service->id}}" service_id="{{$service->id}}" href="javascript:void(0)">Inactive</a>  
                          @endif
                        </td>
                        <td>
                          <a href="{{url('admin/add-edit-service/'.$service['id'] )}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                          <a class="confirmDelete" record="service" recoedid="{{$service->id}}" href="javascript:void('0')"><button class="btn btn-danger btn-sm">Delete</button></a>
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
    $('#service').DataTable();
} );
</script>
@endsection