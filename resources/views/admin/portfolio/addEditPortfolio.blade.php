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
                    <li class="breadcrumb-item"><a href="{{route('admin.portfolios')}}">Portfolio List</a></li>
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
                    <form id="exampleForm" class="tooltip-label-end" novalidate="novalidate" @if(empty($portfoliodata['id'])) action="{{route('admin.addEdit.portfolio')}}" @else   action="{{route('admin.addEdit.portfolio',$portfoliodata['id'] )}}" @endif method="post" enctype="multipart/form-data">
                        @csrf 
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" @if(!empty($portfoliodata['title'])) value="{{$portfoliodata['title']}}" @else value="{{ old('title')}}" @endif>
                      </div>
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Link</label>
                        <input type="text" class="form-control" name="link" placeholder="Enter Title" @if(!empty($portfoliodata['link'])) value="{{$portfoliodata['link']}}" @else value="{{ old('link')}}" @endif>
                      </div>
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Enter Description">@if(!empty($portfoliodata['description'])) {{$portfoliodata['description']}} @else {{ old('description')}} @endif</textarea>
                      </div>
                      <div class="mb-3 position-relative form-group">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                      </div>
                        @if(!empty($portfoliodata['image']))
                            <div style="height: 90px;">
                                <img style="width: 80px; margin-top: 5px;" src="{{asset($portfoliodata['image'])}}" >
                                &nbsp;
                                <a class="confirmDelete btn btn-danger btn-sm" record="porfolioImage" recoedid="{{$portfoliodata->id}}" href="javascript:void('0')"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        @endif
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
