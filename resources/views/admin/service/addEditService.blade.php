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
                    <li class="breadcrumb-item"><a href="{{route('admin.services')}}">Service List</a></li>
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
                    @include('message.danger')
                    <!-- tooltip-label-end inputs should be wrapped in form-group class -->
                    <form id="exampleForm" class="tooltip-label-end" novalidate="novalidate" @if(empty($servicedata['id'])) action="{{url('admin/add-edit-service')}}" @else   action="{{url('admin/add-edit-service/'.$servicedata['id'] )}}" @endif method="post">
                        @csrf 
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" @if(!empty($servicedata['title'])) value="{{$servicedata['title']}}" @else value="{{ old('title')}}" @endif>
                      </div>
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Enter Description">@if(!empty($servicedata['description'])) {{$servicedata['description']}} @else {{ old('description')}} @endif</textarea>
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
