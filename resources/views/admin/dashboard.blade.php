@php
    $html_tag_data = [];
    $title = 'Dashboard';
    $description= 'Dashboard for Admin';
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
          <div class="page-title-container mb-3">
            <div class="row">
              <!-- Title Start -->
              <div class="col mb-2">
                <h1 class="mb-2 pb-0 display-4" id="title">Welcome, {{Auth::user()->name}}</h1>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <div class="row">
            <!-- Introduction Banner Start -->
            <div class="col-12 col-lg-8 mb-5">
              <div class="card sh-45 h-lg-100 position-relative bg-theme">
                <img src="{{asset('backend/img/illustration/database.webp')}}" class="card-img h-100 position-absolute theme-filter" alt="card image" />
                <div class="card-img-overlay d-flex flex-column justify-content-end bg-transparent">
                  <div class="mb-4">
                    <div class="cta-1 mb-2 w-75 w-sm-50">{{Auth::user()->name}}</div>
                    <div class="w-50 text-alternate">{{Auth::user()->bio}}</div>
                  </div>
                  <div>
                    <a href="{{route('admin.profile')}}" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                      <i data-acorn-icon="chevron-right"></i>
                      <span>Profile</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Introduction Banner End -->

            <!-- Introduction List Start -->
            <div class="col-12 col-lg-4 mb-5">
              <div class="scroll-out">
                <div class="scroll-by-count" data-count="4">
                  <div class="card mb-2 hover-border-primary">
                    <a href="{{route('admin.contacts')}}" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i class="fa-solid fa-envelope"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Total Email ({{$contact}})</div>
                            <div class="text-small text-muted">Clint Mail your.</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="{{route('admin.skill')}}" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i class="fa-solid fa-tag"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Total Skill ({{$skill}})</div>
                            <div class="text-small text-muted">Your Skill Samary</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="{{route('admin.portfolios')}}" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i class="fa-solid fa-layer-group"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Total Portfolio ({{$portfolio}})</div>
                            <div class="text-small text-muted">Your Portfolio Samary.</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="{{route('admin.services')}}" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i class="fa-brands fa-servicestack"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Total Service ({{$service}})</div>
                            <div class="text-small text-muted">Your Service Samary.</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="{{route('admin.logos')}}" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i class="fa-brands fa-creative-commons-share"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Total Logo ({{$logo}})</div>
                            <div class="text-small text-muted">You Number of Company work .</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="{{route('admin.testmonials')}}" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i class="fa-solid fa-comment"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Total Tesmonial ({{$testmonial}})</div>
                            <div class="text-small text-muted">Clint Feedback .</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Introduction List End -->
          </div>

        </div>
        <!-- Page Content End -->
      </div>
    </div>
  </main>
  @endsection