@php
    $html_tag_data = [];
    $title = $name;
    $description= $name.' for Admin';
@endphp
@extends('layouts.admin_layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<main>
    <div class="container">
      <div class="row">
        <!-- Menu Start -->
        @include('layouts.admin_layouts.sitebar')
        <!-- Menu End -->
        <div class="col">
            <!-- Title Start -->
            <section class="scroll-section" id="title">
              <div class="page-title-container">
                <h1 class="mb-0 pb-0 display-4">{{$name}}</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.logos')}}">Logo List</a></li>
                  </ul>
                </nav>
              </div>
            </section>
            <!-- Title End -->

            <!-- Content Start -->
            <div>
             
              <!-- Basic Start -->
              <section class="scroll-section" id="basic">
                
                <div class="card mb-5">
                  <div class="card-body">
                    <!-- tooltip-label-end inputs should be wrapped in form-group class -->
                    <form id="exampleForm" class="tooltip-label-end" novalidate="novalidate" @if(empty($logodata['id'])) action="{{route('admin.addEdit.logo')}}" @else   action="{{route('admin.addEdit.logo',$logodata['id'] )}}" @endif method="post" enctype="multipart/form-data">
                        @csrf 
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                        @if(!empty($logodata['image']))
                        <div style="height: 90px;">
                            <img style="width: 60px; margin-top: 5px;" src="{{asset($logodata['image'])}}" >
                            &nbsp;
                            <a class="confirmDelete btn btn-danger btn-sm" record="logoImage" recoedid="{{$logodata->id}}" href="javascript:void('0')"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      @endif
                      </div>
                      <button type="submit" class="btn btn-primary mb-0">{{$name}}</button>
                    </form>
                  </div>
                </div>
              </section>
              <!-- Basic Start -->

     
            </div>
            <!-- Content End -->
          </div>
        <!-- Page Content End -->
      </div>
    </div>
  </main>
@endsection
