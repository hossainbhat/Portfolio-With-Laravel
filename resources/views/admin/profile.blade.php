@php
    $html_tag_data = [];
    $title = 'Profile';
    $description= 'Admin Profile';
@endphp
@extends('layouts.admin_layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<main>
    <div class="container">
      <!-- Title and Top Buttons Start -->
      <div class="page-title-container">
        <div class="row">
          <!-- Title Start -->
          <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">{{Auth::user()->name}}</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
              <ul class="breadcrumb pt-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.profile')}}">Profile</a></li>
              </ul>
            </nav>
          </div>
          <!-- Title End -->

          <!-- Top Buttons Start -->
          <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
           <a href="{{route('admin.profile.update')}}">
                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-edit-square undefined"><path d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11"></path><path d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z"></path></svg>
                    <span>Edit</span>
                </button>
            </a> 
          </div>
          <!-- Top Buttons End -->
        </div>
      </div>
      <!-- Title and Top Buttons End -->

      <div class="row">
        <!-- Left Side Start -->
        <div class="col-12 col-xl-4 col-xxl-3">
          <!-- Biography Start -->
          <h2 class="small-title">Profile</h2>
          <div class="card mb-5">
            <div class="card-body">
              <div class="d-flex align-items-center flex-column mb-4">
                <div class="d-flex align-items-center flex-column">
                  <div class="sw-13 position-relative mb-3">
                    <img @if(Auth::user()->image) src="{{asset(Auth::user()->image)}}" @else src="{{asset('backend/img/profile/profile-2.webp')}}" @endif  class="img-fluid rounded-xl" alt="thumb">
                  </div>
                  <div class="h5 mb-0">{{Auth::user()->name}}</div>
                  <div class="text-muted">{{Auth::user()->title}}</div>
                  <div class="text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-pin me-1"><path d="M3.5 8.49998C3.5 -0.191432 16.5 -0.191368 16.5 8.49998C16.5 12.6585 12.8256 15.9341 11.0021 17.3036C10.4026 17.7539 9.59777 17.754 8.99821 17.3037C7.17467 15.9342 3.5 12.6585 3.5 8.49998Z"></path></svg>
                    <span class="align-middle">{{Auth::user()->location}}</span>
                  </div>
                </div>
              </div>
              <div class="nav flex-column" role="tablist">
               
                <a class="nav-link active px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#projectsTab" role="tab">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-office me-2"><path d="M3 8L3.18483 9.84826C3.31243 11.1243 3.37623 11.7623 3.71943 12.2125C3.8685 12.408 4.05235 12.5744 4.26175 12.7033C4.74387 13 5.38507 13 6.66746 13H13.3325C14.6149 13 15.2561 13 15.7383 12.7033C15.9477 12.5744 16.1315 12.408 16.2806 12.2125C16.6238 11.7623 16.6876 11.1243 16.8152 9.84826L17 8"></path><path d="M13.8838 8.14084C13.9301 8.8824 13.9533 9.25318 13.7881 9.52272C13.7167 9.63915 13.6222 9.73972 13.5104 9.81824C13.2517 10 12.8802 10 12.1372 10L7.86279 10C7.11978 10 6.74828 10 6.48957 9.81824C6.37782 9.73972 6.28334 9.63915 6.21195 9.52272C6.04668 9.25318 6.06985 8.8824 6.1162 8.14084L6.39745 3.64084C6.43883 2.97866 6.45953 2.64758 6.63028 2.41242C6.70436 2.31041 6.79706 2.22332 6.90349 2.15575C7.14884 2 7.48057 2 8.14404 2L11.856 2C12.5194 2 12.8512 2 13.0965 2.15575C13.2029 2.22332 13.2956 2.31041 13.3697 2.41242C13.5405 2.64758 13.5612 2.97866 13.6026 3.64084L13.8838 8.14084Z"></path><path d="M10 10 10 15.5M10 15.5 5 17M10 15.5 15 17"></path><path d="M14 17C14 16.4477 14.4477 16 15 16V16C15.5523 16 16 16.4477 16 17V17C16 17.5523 15.5523 18 15 18V18C14.4477 18 14 17.5523 14 17V17zM4 17C4 16.4477 4.44772 16 5 16V16C5.55228 16 6 16.4477 6 17V17C6 17.5523 5.55228 18 5 18V18C4.44772 18 4 17.5523 4 17V17z"></path></svg>
                  <span class="align-middle">Projects</span>
                </a>
                
                <a class="nav-link px-0" data-bs-toggle="tab" href="#aboutTab" role="tab">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-user me-2"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                  <span class="align-middle">About</span>
                </a>
              </div>
            </div>
          </div>
          <!-- Biography End -->
        </div>
        <!-- Left Side End -->

        <!-- Right Side Start -->
        <div class="col-12 col-xl-8 col-xxl-9 mb-5 tab-content">
          
          <!-- Projects Tab Start -->
          <div class="tab-pane fade show active" id="projectsTab" role="tabpanel">
            <h2 class="small-title">Projects</h2>
            <!-- Projects Content Start -->
            <div class="row row-cols-1 row-cols-sm-2 g-2">
              @if($profiles->count()>0)
              @foreach($profiles as $profile)
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">{{$profile['title']}}</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-up text-muted me-2"><path d="M17.8636 5L11.2453 11.6183C10.4771 12.3865 9.23606 12.401 8.45017 11.6508L8.27708 11.4856C7.49119 10.7354 6.25016 10.7498 5.48192 11.5181L2 15"></path><path d="M14 5H18V9"></path></svg>
                        <span class="align-middle text-alternate">Active</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-check-square text-muted me-2"><path d="M17 5L10.6329 12.2032C10.2511 12.6351 9.58418 12.6556 9.17656 12.248L6.92857 10"></path><path d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11"></path></svg>
                        <span class="align-middle text-alternate">Completed</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @endif 
            </div>
            <!-- Projects Content End -->
          </div>
          <!-- Projects Tab End -->

          <!-- About Tab Start -->
          <div class="tab-pane fade" id="aboutTab" role="tabpanel">
            <h2 class="small-title">About</h2>
            <div class="card">
              <div class="card-body">
                <div class="mb-5">
                  <p class="text-small text-muted mb-2">ME</p>
                  <p>
                    {{Auth::user()->bio}}
                  </p>
                </div>
                <div>
                  <p class="text-small text-muted mb-2">CONTACT</p>
                  <a href="#" class="d-block body-link">
                    <i class="fa-solid fa-phone"></i>
                    <span class="align-middle">{{Auth::user()->phone}}</span>
                  </a>
                  <a href="#" class="d-block body-link">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="align-middle">{{Auth::user()->email}}</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- About Tab End -->
        </div>
        <!-- Right Side End -->
      </div>
    </div>
  </main>
@endsection