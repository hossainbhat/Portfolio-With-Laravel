@php
    $html_tag_data = [];
    $title = 'Dashboard';
    $description= 'Dashboard for Admin';
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
                <a class="nav-link active px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#overviewTab" role="tab">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-activity me-2"><path d="M2 10H4.82798C5.04879 10 5.24345 10.1448 5.3069 10.3563L7.10654 16.3551C7.25028 16.8343 7.93071 16.8287 8.06664 16.3473L11.905 2.75299C12.0432 2.26379 12.7384 2.26886 12.8693 2.76003L14.701 9.62883C14.7594 9.84771 14.9576 10 15.1841 10H18"></path></svg>
                  <span class="align-middle">Overview</span>
                </a>
                <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#projectsTab" role="tab">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-office me-2"><path d="M3 8L3.18483 9.84826C3.31243 11.1243 3.37623 11.7623 3.71943 12.2125C3.8685 12.408 4.05235 12.5744 4.26175 12.7033C4.74387 13 5.38507 13 6.66746 13H13.3325C14.6149 13 15.2561 13 15.7383 12.7033C15.9477 12.5744 16.1315 12.408 16.2806 12.2125C16.6238 11.7623 16.6876 11.1243 16.8152 9.84826L17 8"></path><path d="M13.8838 8.14084C13.9301 8.8824 13.9533 9.25318 13.7881 9.52272C13.7167 9.63915 13.6222 9.73972 13.5104 9.81824C13.2517 10 12.8802 10 12.1372 10L7.86279 10C7.11978 10 6.74828 10 6.48957 9.81824C6.37782 9.73972 6.28334 9.63915 6.21195 9.52272C6.04668 9.25318 6.06985 8.8824 6.1162 8.14084L6.39745 3.64084C6.43883 2.97866 6.45953 2.64758 6.63028 2.41242C6.70436 2.31041 6.79706 2.22332 6.90349 2.15575C7.14884 2 7.48057 2 8.14404 2L11.856 2C12.5194 2 12.8512 2 13.0965 2.15575C13.2029 2.22332 13.2956 2.31041 13.3697 2.41242C13.5405 2.64758 13.5612 2.97866 13.6026 3.64084L13.8838 8.14084Z"></path><path d="M10 10 10 15.5M10 15.5 5 17M10 15.5 15 17"></path><path d="M14 17C14 16.4477 14.4477 16 15 16V16C15.5523 16 16 16.4477 16 17V17C16 17.5523 15.5523 18 15 18V18C14.4477 18 14 17.5523 14 17V17zM4 17C4 16.4477 4.44772 16 5 16V16C5.55228 16 6 16.4477 6 17V17C6 17.5523 5.55228 18 5 18V18C4.44772 18 4 17.5523 4 17V17z"></path></svg>
                  <span class="align-middle">Projects</span>
                </a>
                <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#permissionsTab" role="tab">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-lock-off me-2"><path d="M5 12.6667C5 12.0467 5 11.7367 5.06815 11.4824C5.25308 10.7922 5.79218 10.2531 6.48236 10.0681C6.73669 10 7.04669 10 7.66667 10H12.3333C12.9533 10 13.2633 10 13.5176 10.0681C14.2078 10.2531 14.7469 10.7922 14.9319 11.4824C15 11.7367 15 12.0467 15 12.6667V13C15 13.9293 15 14.394 14.9231 14.7804C14.6075 16.3671 13.3671 17.6075 11.7804 17.9231C11.394 18 10.9293 18 10 18V18C9.07069 18 8.60603 18 8.21964 17.9231C6.63288 17.6075 5.39249 16.3671 5.07686 14.7804C5 14.394 5 13.9293 5 13V12.6667Z"></path><path d="M11 15H10 9M13 6V5C13 3.34315 11.6569 2 10 2V2C8.34315 2 7 3.34315 7 5V10"></path></svg>
                  <span class="align-middle">Permissions</span>
                </a>
                <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#friendsTab" role="tab">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-heart me-2"><path d="M8.76342 3.53821L9.38606 4.02249C9.74717 4.30335 10.2528 4.30335 10.6139 4.02249L11.2366 3.53822C13.0089 2.15977 15.5753 2.55317 16.8533 4.39919C18.1181 6.22616 17.9917 8.67633 16.5456 10.3635L10.7593 17.1142C10.3602 17.5798 9.63984 17.5798 9.24074 17.1142L3.45439 10.3635C2.00828 8.67633 1.88189 6.22616 3.14672 4.39919C4.42473 2.55317 6.99113 2.15977 8.76342 3.53821Z"></path></svg>
                  <span class="align-middle">Friends</span>
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
          <!-- Overview Tab Start -->
          <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
            <!-- Stats Start -->
            <h2 class="small-title">Stats</h2>
            <div class="mb-5">
              <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="card hover-border-primary">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Projects</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-office text-primary"><path d="M3 8L3.18483 9.84826C3.31243 11.1243 3.37623 11.7623 3.71943 12.2125C3.8685 12.408 4.05235 12.5744 4.26175 12.7033C4.74387 13 5.38507 13 6.66746 13H13.3325C14.6149 13 15.2561 13 15.7383 12.7033C15.9477 12.5744 16.1315 12.408 16.2806 12.2125C16.6238 11.7623 16.6876 11.1243 16.8152 9.84826L17 8"></path><path d="M13.8838 8.14084C13.9301 8.8824 13.9533 9.25318 13.7881 9.52272C13.7167 9.63915 13.6222 9.73972 13.5104 9.81824C13.2517 10 12.8802 10 12.1372 10L7.86279 10C7.11978 10 6.74828 10 6.48957 9.81824C6.37782 9.73972 6.28334 9.63915 6.21195 9.52272C6.04668 9.25318 6.06985 8.8824 6.1162 8.14084L6.39745 3.64084C6.43883 2.97866 6.45953 2.64758 6.63028 2.41242C6.70436 2.31041 6.79706 2.22332 6.90349 2.15575C7.14884 2 7.48057 2 8.14404 2L11.856 2C12.5194 2 12.8512 2 13.0965 2.15575C13.2029 2.22332 13.2956 2.31041 13.3697 2.41242C13.5405 2.64758 13.5612 2.97866 13.6026 3.64084L13.8838 8.14084Z"></path><path d="M10 10 10 15.5M10 15.5 5 17M10 15.5 15 17"></path><path d="M14 17C14 16.4477 14.4477 16 15 16V16C15.5523 16 16 16.4477 16 17V17C16 17.5523 15.5523 18 15 18V18C14.4477 18 14 17.5523 14 17V17zM4 17C4 16.4477 4.44772 16 5 16V16C5.55228 16 6 16.4477 6 17V17C6 17.5523 5.55228 18 5 18V18C4.44772 18 4 17.5523 4 17V17z"></path></svg>
                      </div>
                      <div class="text-small text-muted mb-1">ACTIVE</div>
                      <div class="cta-1 text-primary">14</div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="card hover-border-primary">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Tasks</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-check-square text-primary"><path d="M17 5L10.6329 12.2032C10.2511 12.6351 9.58418 12.6556 9.17656 12.248L6.92857 10"></path><path d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11"></path></svg>
                      </div>
                      <div class="text-small text-muted mb-1">PENDING</div>
                      <div class="cta-1 text-primary">153</div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="card hover-border-primary">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Notes</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-file-empty text-primary"><path d="M6.5 18H13.5C14.9045 18 15.6067 18 16.1111 17.6629C16.3295 17.517 16.517 17.3295 16.6629 17.1111C17 16.6067 17 15.9045 17 14.5V7.44975C17 6.83775 17 6.53175 16.9139 6.24786C16.8759 6.12249 16.8256 6.00117 16.7638 5.88563C16.624 5.62399 16.4076 5.40762 15.9749 4.97487L14.0251 3.02513L14.0251 3.02512C13.5924 2.59238 13.376 2.37601 13.1144 2.23616C12.9988 2.1744 12.8775 2.12415 12.7521 2.08612C12.4682 2 12.1622 2 11.5503 2H6.5C5.09554 2 4.39331 2 3.88886 2.33706C3.67048 2.48298 3.48298 2.67048 3.33706 2.88886C3 3.39331 3 4.09554 3 5.5V14.5C3 15.9045 3 16.6067 3.33706 17.1111C3.48298 17.3295 3.67048 17.517 3.88886 17.6629C4.39331 18 5.09554 18 6.5 18Z"></path></svg>
                      </div>
                      <div class="text-small text-muted mb-1">RECENT</div>
                      <div class="cta-1 text-primary">24</div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <div class="card hover-border-primary">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Views</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-screen text-primary"><path d="M10 15V16V18M8 18H12"></path><path d="M14.5 2C15.9045 2 16.6067 2 17.1111 2.33706C17.3295 2.48298 17.517 2.67048 17.6629 2.88886C18 3.39331 18 4.09554 18 5.5L18 11.5C18 12.9045 18 13.6067 17.6629 14.1111C17.517 14.3295 17.3295 14.517 17.1111 14.6629C16.6067 15 15.9045 15 14.5 15L5.5 15C4.09554 15 3.39331 15 2.88886 14.6629C2.67048 14.517 2.48298 14.3295 2.33706 14.1111C2 13.6067 2 12.9045 2 11.5L2 5.5C2 4.09554 2 3.39331 2.33706 2.88886C2.48298 2.67048 2.67048 2.48298 2.88886 2.33706C3.39331 2 4.09554 2 5.5 2L14.5 2Z"></path><path d="M9 7 7 10M13.2412 7 11.2412 10"></path></svg>
                      </div>
                      <div class="text-small text-muted mb-1">THIS MONTH</div>
                      <div class="cta-1 text-primary">524</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Stats End -->

            <!-- Activity Start -->
            <h2 class="small-title">Activity</h2>
            <div class="card mb-5">
              <div class="card-body">
                <div class="sh-35"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="bubbleChart" style="display: block; height: 280px; width: 304px;" width="608" height="560" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
            </div>
            <!-- Activity End -->

            <!-- Timeline Start -->
            <h2 class="small-title">Timeline</h2>
            <div class="card mb-5">
              <div class="card-body">
                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1"></div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                  </div>
                  <div class="col mb-4">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link">Developing Components</a>
                          <div class="text-alternate">21.12.2020</div>
                          <div class="text-muted mt-1">
                            Jujubes tootsie roll liquorice cake jelly beans pudding gummi bears chocolate cake donut. Jelly-o sugar plum fruitcake bonbon
                            bear claw cake cookie chocolate bar. Tiramisu soufflé apple pie.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                  </div>
                  <div class="col mb-4">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link pt-0">HTML Structure</a>
                          <div class="text-alternate">14.12.2020</div>
                          <div class="text-muted mt-1">
                            Pudding gummi bears chocolate chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                  </div>
                  <div class="col mb-4">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link">Sass Structure</a>
                          <div class="text-alternate">03.11.2020</div>
                          <div class="text-muted mt-1">
                            Jelly-o wafer sesame snaps candy canes. Danish dragée toffee bonbon. Jelly-o marshmallow cake oat cake caramels jujubes.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                  </div>
                  <div class="col mb-4">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link pt-0">Final Design</a>
                          <div class="text-alternate">15.10.2020</div>
                          <div class="text-muted mt-1">Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-0">
                  <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex sh-1 position-relative justify-content-center">
                      <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                      <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative"></div>
                  </div>
                  <div class="col">
                    <div class="h-100">
                      <div class="d-flex flex-column justify-content-start">
                        <div class="d-flex flex-column">
                          <a href="#" class="heading stretched-link pt-0">Wireframe Design</a>
                          <div class="text-alternate">08.06.2020</div>
                          <div class="text-muted mt-1">Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Timeline End -->

            <!-- Logs Start -->
            <h2 class="small-title">Logs</h2>
            <div class="card">
              <div class="card-body mb-n2">
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-circle text-primary align-top"><circle cx="10" cy="10" r="7"></circle></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">New user registiration</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">18 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-circle text-primary align-top"><circle cx="10" cy="10" r="7"></circle></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">3 new product added</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">18 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-square text-secondary align-top"><path d="M13.5 3C14.9045 3 15.6067 3 16.1111 3.33706C16.3295 3.48298 16.517 3.67048 16.6629 3.88886C17 4.39331 17 5.09554 17 6.5L17 13.5C17 14.9045 17 15.6067 16.6629 16.1111C16.517 16.3295 16.3295 16.517 16.1111 16.6629C15.6067 17 14.9045 17 13.5 17L6.5 17C5.09554 17 4.39331 17 3.88886 16.6629C3.67048 16.517 3.48298 16.3295 3.33706 16.1111C3 15.6067 3 14.9045 3 13.5L3 6.5C3 5.09554 3 4.39331 3.33706 3.88886C3.48298 3.67048 3.67048 3.48298 3.88886 3.33706C4.39331 3 5.09554 3 6.5 3L13.5 3Z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">
                          Product out of stock:
                          <a href="#" class="alternate-link underline-link">Breadstick</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">16 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-square text-secondary align-top"><path d="M13.5 3C14.9045 3 15.6067 3 16.1111 3.33706C16.3295 3.48298 16.517 3.67048 16.6629 3.88886C17 4.39331 17 5.09554 17 6.5L17 13.5C17 14.9045 17 15.6067 16.6629 16.1111C16.517 16.3295 16.3295 16.517 16.1111 16.6629C15.6067 17 14.9045 17 13.5 17L6.5 17C5.09554 17 4.39331 17 3.88886 16.6629C3.67048 16.517 3.48298 16.3295 3.33706 16.1111C3 15.6067 3 14.9045 3 13.5L3 6.5C3 5.09554 3 4.39331 3.33706 3.88886C3.48298 3.67048 3.67048 3.48298 3.88886 3.33706C4.39331 3 5.09554 3 6.5 3L13.5 3Z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">Category page returned an error</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-circle text-primary align-top"><circle cx="10" cy="10" r="7"></circle></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">14 products added</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-hexagon text-tertiary align-top"><path d="M9 2.57735C9.6188 2.22008 10.3812 2.22008 11 2.57735L15.9282 5.42265C16.547 5.77992 16.9282 6.44017 16.9282 7.1547V12.8453C16.9282 13.5598 16.547 14.2201 15.9282 14.5774L11 17.4226C10.3812 17.7799 9.6188 17.7799 9 17.4226L4.0718 14.5774C3.45299 14.2201 3.0718 13.5598 3.0718 12.8453V7.1547C3.0718 6.44017 3.45299 5.77992 4.0718 5.42265L9 2.57735Z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">
                          New sale:
                          <a href="#" class="alternate-link underline-link">Steirer Brot</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-hexagon text-tertiary align-top"><path d="M9 2.57735C9.6188 2.22008 10.3812 2.22008 11 2.57735L15.9282 5.42265C16.547 5.77992 16.9282 6.44017 16.9282 7.1547V12.8453C16.9282 13.5598 16.547 14.2201 15.9282 14.5774L11 17.4226C10.3812 17.7799 9.6188 17.7799 9 17.4226L4.0718 14.5774C3.45299 14.2201 3.0718 13.5598 3.0718 12.8453V7.1547C3.0718 6.44017 3.45299 5.77992 4.0718 5.42265L9 2.57735Z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">
                          New sale:
                          <a href="#" class="alternate-link underline-link">Soda Bread</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0 mb-2">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-triangle text-warning align-top"><path d="M8.49441 3.95707C9.14861 2.68098 10.8514 2.68098 11.5056 3.95706L16.7832 14.2516C17.4163 15.4864 16.5871 17 15.2776 17H4.72238C3.41289 17 2.58375 15.4864 3.21679 14.2516L8.49441 3.95707Z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">Recived a support ticket</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">14 Dec</div>
                    </div>
                  </div>
                </div>
                <div class="row g-0">
                  <div class="col-auto">
                    <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                      <div class="sh-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-hexagon text-tertiary align-top"><path d="M9 2.57735C9.6188 2.22008 10.3812 2.22008 11 2.57735L15.9282 5.42265C16.547 5.77992 16.9282 6.44017 16.9282 7.1547V12.8453C16.9282 13.5598 16.547 14.2201 15.9282 14.5774L11 17.4226C10.3812 17.7799 9.6188 17.7799 9 17.4226L4.0718 14.5774C3.45299 14.2201 3.0718 13.5598 3.0718 12.8453V7.1547C3.0718 6.44017 3.45299 5.77992 4.0718 5.42265L9 2.57735Z"></path></svg>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                      <div class="d-flex flex-column">
                        <div class="text-alternate mt-n1 lh-1-25">
                          New sale:
                          <a href="#" class="alternate-link underline-link">Cholermüs</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                      <div class="text-muted ms-2 mt-n1 lh-1-25">13 Dec</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Logs End -->
          </div>
          <!-- Overview Tab End -->

          <!-- Projects Tab Start -->
          <div class="tab-pane fade" id="projectsTab" role="tabpanel">
            <h2 class="small-title">Projects</h2>

            <!-- Search Start -->
            <div class="row mb-3 g-2">
              <div class="col mb-1">
                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                  <input class="form-control" placeholder="Search">
                  <span class="search-magnifier-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-search undefined"><circle cx="9" cy="9" r="7"></circle><path d="M14 14L17.5 17.5"></path></svg>
                  </span>
                  <span class="search-delete-icon d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close undefined"><path d="M5 5 15 15M15 5 5 15"></path></svg>
                  </span>
                </div>
              </div>
              <div class="col-auto text-end mb-1">
                <div class="dropdown-as-select d-inline-block" data-childselector="span">
                  <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="btn btn-foreground-alternate dropdown-toggle sw-13">All</span>
                  </button>
                  <div class="dropdown-menu shadow dropdown-menu-end">
                    <a class="dropdown-item active" href="#">All</a>
                    <a class="dropdown-item" href="#">Active</a>
                    <a class="dropdown-item" href="#">Inactive</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Search End -->

            <!-- Projects Content Start -->
            <div class="row row-cols-1 row-cols-sm-2 g-2">
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Basic Introduction to Bread Making</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 4</span>
                      </div>
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
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">4 Facts About Old Baking Techniques</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 3</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-up text-muted me-2"><path d="M17.8636 5L11.2453 11.6183C10.4771 12.3865 9.23606 12.401 8.45017 11.6508L8.27708 11.4856C7.49119 10.7354 6.25016 10.7498 5.48192 11.5181L2 15"></path><path d="M14 5H18V9"></path></svg>
                        <span class="align-middle text-alternate">Active</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-clock text-muted me-2"><path d="M8 12L9.70711 10.2929C9.89464 10.1054 10 9.851 10 9.58579V6"></path><circle cx="10" cy="10" r="8"></circle></svg>
                        <span class="align-middle text-alternate">Pending</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Apple Cake Recipe for Starters</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 8</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-lock-on text-muted me-2"><path d="M5 12.6667C5 12.0467 5 11.7367 5.06815 11.4824C5.25308 10.7922 5.79218 10.2531 6.48236 10.0681C6.73669 10 7.04669 10 7.66667 10H12.3333C12.9533 10 13.2633 10 13.5176 10.0681C14.2078 10.2531 14.7469 10.7922 14.9319 11.4824C15 11.7367 15 12.0467 15 12.6667V13C15 13.9293 15 14.394 14.9231 14.7804C14.6075 16.3671 13.3671 17.6075 11.7804 17.9231C11.394 18 10.9293 18 10 18V18C9.07069 18 8.60603 18 8.21964 17.9231C6.63288 17.6075 5.39249 16.3671 5.07686 14.7804C5 14.394 5 13.9293 5 13V12.6667Z"></path><path d="M11 15H10 9M13 10V5C13 3.34315 11.6569 2 10 2V2C8.34315 2 7 3.34315 7 5V10"></path></svg>
                        <span class="align-middle text-alternate">Locked</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-sync-horizontal text-muted me-2"><path d="M3 5 16 5.00001C17.1046 5.00001 18 5.89544 18 7.00001V8M17 15 4.00001 15C2.89544 15 2.00001 14.1046 2.00001 13V12"></path><path d="M5 8 2 5 5 2M15 12 18 15 15 18"></path></svg>
                        <span class="align-middle text-alternate">Continuing</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">A Complete Guide to Mix Dough for the Molds</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 12</span>
                      </div>
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
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">14 Facts About Sugar Products</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 2</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-down text-muted me-2"><path d="M2.13635 15L8.75466 8.38171C9.5229 7.61348 10.7639 7.59905 11.5498 8.34921L11.7229 8.51443C12.5088 9.2646 13.7498 9.25017 14.5181 8.48193L18 5.00001"></path><path d="M6 15L2 15L2 11"></path></svg>
                        <span class="align-middle text-alternate">Inactive</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-archive text-muted me-2"><path d="M16.25 2H3.75C3.04777 2 2.69665 2 2.44443 2.16853C2.33524 2.24149 2.24149 2.33524 2.16853 2.44443C2 2.69665 2 3.04777 2 3.75V5.25C2 5.95223 2 6.30335 2.16853 6.55557C2.24149 6.66476 2.33524 6.75851 2.44443 6.83147C2.69665 7 3.04777 7 3.75 7H16.25C16.9522 7 17.3033 7 17.5556 6.83147C17.6648 6.75851 17.7585 6.66476 17.8315 6.55557C18 6.30335 18 5.95223 18 5.25V3.75C18 3.04777 18 2.69665 17.8315 2.44443C17.7585 2.33524 17.6648 2.24149 17.5556 2.16853C17.3033 2 16.9522 2 16.25 2Z"></path><path d="M13.5 7C14.9045 7 15.6067 7 16.1111 7.33706C16.3295 7.48298 16.517 7.67048 16.6629 7.88886C17 8.39331 17 9.09554 17 10.5L17 14.5C17 15.9045 17 16.6067 16.6629 17.1111C16.517 17.3295 16.3295 17.517 16.1111 17.6629C15.6067 18 14.9045 18 13.5 18L6.5 18C5.09554 18 4.39331 18 3.88886 17.6629C3.67048 17.517 3.48298 17.3295 3.33706 17.1111C3 16.6067 3 15.9045 3 14.5L3 10.5C3 9.09554 3 8.39331 3.33706 7.88886C3.48298 7.67048 3.67048 7.48298 3.88886 7.33706C4.39331 7 5.09554 7 6.5 7L13.5 7Z"></path><path d="M9 10H11"></path></svg>
                        <span class="align-middle text-alternate">Archived</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Easy and Efficient Tricks for Baking Crispy Breads</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 2</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-up text-muted me-2"><path d="M17.8636 5L11.2453 11.6183C10.4771 12.3865 9.23606 12.401 8.45017 11.6508L8.27708 11.4856C7.49119 10.7354 6.25016 10.7498 5.48192 11.5181L2 15"></path><path d="M14 5H18V9"></path></svg>
                        <span class="align-middle text-alternate">Active</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-clock text-muted me-2"><path d="M8 12L9.70711 10.2929C9.89464 10.1054 10 9.851 10 9.58579V6"></path><circle cx="10" cy="10" r="8"></circle></svg>
                        <span class="align-middle text-alternate">Pending</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Apple Cake Recipe for Starters</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 6</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-down text-muted me-2"><path d="M2.13635 15L8.75466 8.38171C9.5229 7.61348 10.7639 7.59905 11.5498 8.34921L11.7229 8.51443C12.5088 9.2646 13.7498 9.25017 14.5181 8.48193L18 5.00001"></path><path d="M6 15L2 15L2 11"></path></svg>
                        <span class="align-middle text-alternate">Inactive</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-archive text-muted me-2"><path d="M16.25 2H3.75C3.04777 2 2.69665 2 2.44443 2.16853C2.33524 2.24149 2.24149 2.33524 2.16853 2.44443C2 2.69665 2 3.04777 2 3.75V5.25C2 5.95223 2 6.30335 2.16853 6.55557C2.24149 6.66476 2.33524 6.75851 2.44443 6.83147C2.69665 7 3.04777 7 3.75 7H16.25C16.9522 7 17.3033 7 17.5556 6.83147C17.6648 6.75851 17.7585 6.66476 17.8315 6.55557C18 6.30335 18 5.95223 18 5.25V3.75C18 3.04777 18 2.69665 17.8315 2.44443C17.7585 2.33524 17.6648 2.24149 17.5556 2.16853C17.3033 2 16.9522 2 16.25 2Z"></path><path d="M13.5 7C14.9045 7 15.6067 7 16.1111 7.33706C16.3295 7.48298 16.517 7.67048 16.6629 7.88886C17 8.39331 17 9.09554 17 10.5L17 14.5C17 15.9045 17 16.6067 16.6629 17.1111C16.517 17.3295 16.3295 17.517 16.1111 17.6629C15.6067 18 14.9045 18 13.5 18L6.5 18C5.09554 18 4.39331 18 3.88886 17.6629C3.67048 17.517 3.48298 17.3295 3.33706 17.1111C3 16.6067 3 15.9045 3 14.5L3 10.5C3 9.09554 3 8.39331 3.33706 7.88886C3.48298 7.67048 3.67048 7.48298 3.88886 7.33706C4.39331 7 5.09554 7 6.5 7L13.5 7Z"></path><path d="M9 10H11"></path></svg>
                        <span class="align-middle text-alternate">Archived</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Simple Guide to Mix Dough</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 22</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-lock-on text-muted me-2"><path d="M5 12.6667C5 12.0467 5 11.7367 5.06815 11.4824C5.25308 10.7922 5.79218 10.2531 6.48236 10.0681C6.73669 10 7.04669 10 7.66667 10H12.3333C12.9533 10 13.2633 10 13.5176 10.0681C14.2078 10.2531 14.7469 10.7922 14.9319 11.4824C15 11.7367 15 12.0467 15 12.6667V13C15 13.9293 15 14.394 14.9231 14.7804C14.6075 16.3671 13.3671 17.6075 11.7804 17.9231C11.394 18 10.9293 18 10 18V18C9.07069 18 8.60603 18 8.21964 17.9231C6.63288 17.6075 5.39249 16.3671 5.07686 14.7804C5 14.394 5 13.9293 5 13V12.6667Z"></path><path d="M11 15H10 9M13 10V5C13 3.34315 11.6569 2 10 2V2C8.34315 2 7 3.34315 7 5V10"></path></svg>
                        <span class="align-middle text-alternate">Locked</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-check-square text-muted me-2"><path d="M17 5L10.6329 12.2032C10.2511 12.6351 9.58418 12.6556 9.17656 12.248L6.92857 10"></path><path d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11"></path></svg>
                        <span class="align-middle text-alternate">Completed</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">10 Secrets Every Southern Baker Knows</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 3</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-up text-muted me-2"><path d="M17.8636 5L11.2453 11.6183C10.4771 12.3865 9.23606 12.401 8.45017 11.6508L8.27708 11.4856C7.49119 10.7354 6.25016 10.7498 5.48192 11.5181L2 15"></path><path d="M14 5H18V9"></path></svg>
                        <span class="align-middle text-alternate">Active</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-sync-horizontal text-muted me-2"><path d="M3 5 16 5.00001C17.1046 5.00001 18 5.89544 18 7.00001V8M17 15 4.00001 15C2.89544 15 2.00001 14.1046 2.00001 13V12"></path><path d="M5 8 2 5 5 2M15 12 18 15 15 18"></path></svg>
                        <span class="align-middle text-alternate">Continuing</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Recipes for Sweet and Healty Treats</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 1</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-down text-muted me-2"><path d="M2.13635 15L8.75466 8.38171C9.5229 7.61348 10.7639 7.59905 11.5498 8.34921L11.7229 8.51443C12.5088 9.2646 13.7498 9.25017 14.5181 8.48193L18 5.00001"></path><path d="M6 15L2 15L2 11"></path></svg>
                        <span class="align-middle text-alternate">Inactive</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-clock text-muted me-2"><path d="M8 12L9.70711 10.2929C9.89464 10.1054 10 9.851 10 9.58579V6"></path><circle cx="10" cy="10" r="8"></circle></svg>
                        <span class="align-middle text-alternate">Pending</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Better Ways to Mix Dough for the Molds</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 20</span>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-trend-up text-muted me-2"><path d="M17.8636 5L11.2453 11.6183C10.4771 12.3865 9.23606 12.401 8.45017 11.6508L8.27708 11.4856C7.49119 10.7354 6.25016 10.7498 5.48192 11.5181L2 15"></path><path d="M14 5H18V9"></path></svg>
                        <span class="align-middle text-alternate">Active</span>
                      </div>
                      <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-clock text-muted me-2"><path d="M8 12L9.70711 10.2929C9.89464 10.1054 10 9.851 10 9.58579V6"></path><circle cx="10" cy="10" r="8"></circle></svg>
                        <span class="align-middle text-alternate">Pending</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="heading mb-3">
                      <a href="#" class="stretched-link">
                        <span class="clamp-line sh-5" data-line="2" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 2;">Introduction to Baking Cakes</span>
                      </a>
                    </h6>
                    <div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-category text-muted me-2"><path d="M10 4 10 14C10 15.1046 10.8954 16 12 16L14 16M14 4 10 4 6 4"></path><path d="M18 16C18 17.1046 17.1046 18 16 18V18C14.8954 18 14 17.1046 14 16V16C14 14.8954 14.8954 14 16 14V14C17.1046 14 18 14.8954 18 16V16zM18 4C18 5.10457 17.1046 6 16 6V6C14.8954 6 14 5.10457 14 4V4C14 2.89543 14.8954 2 16 2V2C17.1046 2 18 2.89543 18 4V4zM6 4C6 5.10457 5.10457 6 4 6V6C2.89543 6 2 5.10457 2 4V4C2 2.89543 2.89543 2 4 2V2C5.10457 2 6 2.89543 6 4V4z"></path></svg>
                        <span class="align-middle text-alternate">Contributors: 13</span>
                      </div>
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
            </div>
            <!-- Projects Content End -->
          </div>
          <!-- Projects Tab End -->

          <!-- Permissions Tab Start -->
          <div class="tab-pane fade" id="permissionsTab" role="tabpanel">
            <h2 class="small-title">Permissions</h2>
            <div class="row row-cols-1 g-2">
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                      <input type="checkbox" class="form-check-input" checked="">
                      <span class="form-check-label">
                        <span class="content opacity-50">
                          <span class="heading mb-1 lh-1-25">Create</span>
                          <span class="d-block text-small text-muted">
                            Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish
                            dragée.
                          </span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                      <input type="checkbox" class="form-check-input" checked="">
                      <span class="form-check-label">
                        <span class="content opacity-50">
                          <span class="heading mb-1 lh-1-25">Publish</span>
                          <span class="d-block text-small text-muted">Jelly beans wafer candy caramels fruitcake macaroon sweet roll.</span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                      <input type="checkbox" class="form-check-input" checked="">
                      <span class="form-check-label">
                        <span class="content opacity-50">
                          <span class="heading mb-1 lh-1-25">Edit</span>
                          <span class="d-block text-small text-muted">Jelly cake jelly sesame snaps jelly beans jelly beans.</span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                      <input type="checkbox" class="form-check-input">
                      <span class="form-check-label">
                        <span class="content opacity-50">
                          <span class="heading mb-1 lh-1-25">Delete</span>
                          <span class="d-block text-small text-muted">Danish oat cake pudding.</span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                      <input type="checkbox" class="form-check-input" checked="">
                      <span class="form-check-label">
                        <span class="content opacity-50">
                          <span class="heading mb-1 lh-1-25">Add User</span>
                          <span class="d-block text-small text-muted">Soufflé chocolate cake chupa chups danish brownie pudding fruitcake.</span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                      <input type="checkbox" class="form-check-input">
                      <span class="form-check-label">
                        <span class="content opacity-50">
                          <span class="heading mb-1 lh-1-25">Edit User</span>
                          <span class="d-block text-small text-muted">Biscuit powder brownie powder sesame snaps jelly-o dragée cake.</span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <label class="form-check custom-icon mb-0 checked-opacity-100">
                      <input type="checkbox" class="form-check-input">
                      <span class="form-check-label">
                        <span class="content opacity-50">
                          <span class="heading mb-1 lh-1-25">Delete User</span>
                          <span class="d-block text-small text-muted">
                            Liquorice jelly powder fruitcake oat cake. Gummies tiramisu cake jelly-o bonbon. Marshmallow liquorice croissant.
                          </span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Permissions Tab End -->

          <!-- Friends Tab Start -->
          <div class="tab-pane fade" id="friendsTab" role="tabpanel">
            <h2 class="small-title">Friends</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-2 mb-5">
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-1.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Blaine Cottrell</div>
                            <div class="text-small text-muted">Project Manager</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-4.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Cherish Kerr</div>
                            <div class="text-small text-muted">Development Lead</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-8.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Kirby Peters</div>
                            <div class="text-small text-muted">Accounting</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-5.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Olli Hawkins</div>
                            <div class="text-small text-muted">Client Relations Lead</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-2.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Zayn Hartley</div>
                            <div class="text-small text-muted">Customer Engagement</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-3.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Esperanza Lodge</div>
                            <div class="text-small text-muted">UX Designer</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-4.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Kerr Jackson</div>
                            <div class="text-small text-muted">Frontend Developer</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-6.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Kathryn Mengel</div>
                            <div class="text-small text-muted">Team Leader</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-6.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Joisse Kaycee</div>
                            <div class="text-small text-muted">Copywriter</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <div class="row g-0 sh-6">
                      <div class="col-auto">
                        <img src="img/profile/profile-7.webp" class="card-img rounded-xl sh-6 sw-6" alt="thumb">
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between">
                          <div class="d-flex flex-column">
                            <div>Zayn Hartley</div>
                            <div class="text-small text-muted">Visual Effect Designer</div>
                          </div>
                          <div class="d-flex">
                            <button type="button" class="btn btn-outline-primary btn-sm ms-1">Follow</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Friends Tab End -->

          <!-- About Tab Start -->
          <div class="tab-pane fade" id="aboutTab" role="tabpanel">
            <h2 class="small-title">About</h2>
            <div class="card">
              <div class="card-body">
                <div class="mb-5">
                  <p class="text-small text-muted mb-2">ME</p>
                  <p>
                    Jujubes brownie marshmallow apple pie donut ice cream jelly-o jelly-o gummi bears. Tootsie roll chocolate bar dragée bonbon cheesecake
                    icing. Danish wafer donut cookie caramels gummies topping.
                  </p>
                </div>
                <div class="mb-5">
                  <p class="text-small text-muted mb-2">INTERESTS</p>
                  <p>
                    Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish dragée.
                    Apple pie cotton candy tiramisu biscuit cake muffin tootsie roll bear claw cake. Cupcake cake fruitcake.
                  </p>
                </div>
                <div>
                  <p class="text-small text-muted mb-2">CONTACT</p>
                  <a href="#" class="d-block body-link mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-screen me-2"><path d="M10 15V16V18M8 18H12"></path><path d="M14.5 2C15.9045 2 16.6067 2 17.1111 2.33706C17.3295 2.48298 17.517 2.67048 17.6629 2.88886C18 3.39331 18 4.09554 18 5.5L18 11.5C18 12.9045 18 13.6067 17.6629 14.1111C17.517 14.3295 17.3295 14.517 17.1111 14.6629C16.6067 15 15.9045 15 14.5 15L5.5 15C4.09554 15 3.39331 15 2.88886 14.6629C2.67048 14.517 2.48298 14.3295 2.33706 14.1111C2 13.6067 2 12.9045 2 11.5L2 5.5C2 4.09554 2 3.39331 2.33706 2.88886C2.48298 2.67048 2.67048 2.48298 2.88886 2.33706C3.39331 2 4.09554 2 5.5 2L14.5 2Z"></path><path d="M9 7 7 10M13.2412 7 11.2412 10"></path></svg>
                    <span class="align-middle">blainecottrell.com</span>
                  </a>
                  <a href="#" class="d-block body-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-email me-2"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                    <span class="align-middle">contact@blainecottrell.com</span>
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