@php
    $html_tag_data = [];
    $title = 'Dashboard';
    $description= 'Ecommerce Dashboard'
@endphp
@extends('backend.layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<main>
    <div class="container">
      <!-- Title and Top Buttons Start -->
      <div class="page-title-container">
        <div class="row">
          <!-- Title Start -->
          <div class="col-12 col-md-7">
            <a class="muted-link pb-2 d-inline-block hidden" href="#">
              <span class="align-middle lh-1 text-small">&nbsp;</span>
            </a>
            <h1 class="mb-0 pb-0 display-4" id="title">Welcome, {{ucwords(auth()->user()->name)}}!</h1>
          </div>
          <!-- Title End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <!-- Stats Start -->
      <div class="row">
        <div class="col-12">
          <div class="d-flex">
            <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
              <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                <span class="small-title"></span>
              </a>
              <div class="dropdown-menu font-standard">
                <div class="nav flex-column" role="tablist">
                  <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                  <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Weekly</a>
                  <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Monthly</a>
                  <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Yearly</a>
                </div>
              </div>
            </div>
            <h2 class="small-title">Stats</h2>
          </div>
          <div class="mb-5">
            <div class="row g-2">
              <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 hover-scale-up cursor-pointer">
                  <div class="card-body d-flex flex-column align-items-center">
                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                      <i class="fa-solid fa-user-gear text-primary"></i>
                    </div>
                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Skill</div>
                    <div class="text-primary cta-4">{{$skill}}</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 hover-scale-up cursor-pointer">
                  <div class="card-body d-flex flex-column align-items-center">
                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                      <i class="fa-solid fa-diagram-project text-primary"></i>
                    </div>
                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Project</div>
                    <div class="text-primary cta-4">{{$portfolio}}</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 hover-scale-up cursor-pointer">
                  <div class="card-body d-flex flex-column align-items-center">
                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                      <i class="fa-solid fa-envelope text-primary"></i>
                    </div>
                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Mail</div>
                    <div class="text-primary cta-4">{{$contact}}</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 hover-scale-up cursor-pointer">
                  <div class="card-body d-flex flex-column align-items-center">
                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                      <i class="fa-solid fa-blog text-primary"></i>
                    </div>
                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Blog</div>
                    <div class="text-primary cta-4">{{$blog}}</div>
                  </div>
                </div>
              </div>
           
            </div>
          </div>
        </div>
      </div>
      <!-- Stats End -->

  

    </div>
  </main>

  @endsection
  @section('js')

  @endsection