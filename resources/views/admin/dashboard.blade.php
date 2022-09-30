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
                <h1 class="mb-2 pb-0 display-4" id="title">Getting Started</h1>
                <div class="text-muted font-heading text-small">Let us manage the database engines for your applications so you can focus on building.</div>
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
                    <div class="cta-1 mb-2 w-75 w-sm-50">Introduction to Cloud</div>
                    <div class="w-50 text-alternate">Lollipop chocolate marzipan marshmallow gummi bears. Tootsie roll liquorice cake jelly beans.</div>
                  </div>
                  <div>
                    <a href="Services.Database.html" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                      <i data-acorn-icon="chevron-right"></i>
                      <span>Getting Started</span>
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
                    <a href="Services.DatabaseAdd.html" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i data-acorn-icon="server"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Add New Volume</div>
                            <div class="text-small text-muted">Snaps muffin macaroon.</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="Services.Storage.html" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i data-acorn-icon="cloud-download"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Cloud Storage</div>
                            <div class="text-small text-muted">Brownie ice cream marshmallow topping.</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="Account.Security.html" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i data-acorn-icon="shield"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Server Security</div>
                            <div class="text-small text-muted">Sugar plum gummi bears jujubes.</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="Services.DatabaseDetail.html" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i data-acorn-icon="chart-4"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Track Metrics</div>
                            <div class="text-small text-muted">Jujubes candy jelly-o topping.</div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card mb-2 hover-border-primary">
                    <a href="Support.Docs.html" class="row g-0 sh-9">
                      <div class="col-auto">
                        <div class="sw-9 sh-9 d-inline-block d-flex justify-content-center align-items-center">
                          <div class="fw-bold text-primary">
                            <i data-acorn-icon="category"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column ps-0 pt-0 pb-0 h-100 justify-content-center">
                          <div class="d-flex flex-column">
                            <div class="text-alternate">Integration Guides</div>
                            <div class="text-small text-muted">Jujubes candy jelly-o topping.</div>
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