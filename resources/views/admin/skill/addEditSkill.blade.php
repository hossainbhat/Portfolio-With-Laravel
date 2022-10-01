@php
    $html_tag_data = [];
    $title = 'Skill List';
    $description= 'Skill for Admin';
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
                    <li class="breadcrumb-item"><a href="{{route('admin.skill')}}">Skill List</a></li>
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
                    <form id="exampleForm" class="tooltip-label-end" novalidate="novalidate" @if(empty($skilldata['id'])) action="{{url('admin/add-edit-skill')}}" @else   action="{{url('admin/add-edit-skill/'.$skilldata['id'] )}}" @endif method="post">
                        @csrf 
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Skill Title" @if(!empty($skilldata['title'])) value="{{$skilldata['title']}}" @else value="{{ old('title')}}" @endif>
                      </div>
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Percentage</label>
                        <input type="text" class="form-control" name="persent" placeholder="Enter Percentage" @if(!empty($skilldata['persent'])) value="{{$skilldata['persent']}}" @else value="{{ old('persent')}}" @endif>
                      </div>
                      
                      {{-- <div class="mb-3 position-relative form-group">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                          <input type="checkbox" name="status" class="form-check-input" id="basicValidationCheckboxSingle">
                          <label class="form-check-label" for="basicValidationCheckboxSingle">Status</label>
                        </div>
                      </div> --}}
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
