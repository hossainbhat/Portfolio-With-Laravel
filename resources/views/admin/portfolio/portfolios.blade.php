@php
    $html_tag_data = [];
    $title = 'Portfolio';
    $description= 'Portfolio for Admin';
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
                  <h1 class="mb-0 pb-0 display-4" id="title">Porfolio List</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('admin.portfolios')}}">Porfolios</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <!-- Add New Button Start -->
                  <a href="{{route('admin.addEdit.portfolio')}}"><button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
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
                <table id="portfolio" class="data-table nowrap hover">
                  <thead>
                    <tr>
                      <th class="text-muted text-small text-uppercase" width="10%">ID</th>
                      <th class="text-muted text-small text-uppercase">Title</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Description</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Image</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Link</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Status</th>
                      <th class="text-muted text-small text-uppercase" width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($portfolios->count()>0)
                      @foreach ($portfolios as $key=>$portfolio) 
                      <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$portfolio['title']}}</td>
                          <td>{{ \Illuminate\Support\Str::limit($portfolio['description'], 10, $end='...') }}</td>
                          <td><img src="{{asset($portfolio['image'])}}" alt="" width="50" height="50"></td>
                          <td>{{ \Illuminate\Support\Str::limit($portfolio['link'], 10, $end='...') }}</td>
                          <td>
                            @if($portfolio->status ==1)
                              <a class="updatePorfolioStatus" id="portfolio-{{$portfolio->id}}" portfolio_id="{{$portfolio->id}}" href="javascript:void(0)">Active</a>  
                            @else
                              <a class="updatePorfolioStatus" id="portfolio-{{$portfolio->id}}" portfolio_id="{{$portfolio->id}}" href="javascript:void(0)">Inactive</a>  
                            @endif
                          </td>
                          <td>
                            <a href="{{route('admin.addEdit.portfolio',$portfolio['id'] )}}"><button class="btn btn-primary btn-sm">Edit</button></a> 
                            <a class="confirmDelete" record="portfolio" recoedid="{{$portfolio->id}}" href="javascript:void('0')"><button class="btn btn-danger btn-sm">Delete</button></a>
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
    $('#portfolio').DataTable();
} );
</script>
@endsection