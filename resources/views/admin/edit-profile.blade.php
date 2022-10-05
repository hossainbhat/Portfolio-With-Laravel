@php
    $html_tag_data = [];
    $title = 'Edit Profile';
    $description= 'Edit Profile for Admin';
@endphp
@extends('layouts.admin_layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<main>
    <div class="container">
      <div class="row">
        <div class="col-auto d-none d-lg-flex">
          <div class="nav flex-column sw-25 mt-n2" id="settingsColumn"></div>
        </div>

        <div class="col">
          <!-- Title and Top Buttons Start -->
          <div class="page-title-container">
            <div class="row">
              <!-- Title Start -->
              <div class="col">
                <h1 class="mb-0 pb-0 display-4" id="title">Profile</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.profile')}}">Profile</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.profile.update')}}">Edit Profile</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Title End -->

              <!-- Top Buttons Start -->
              <div class="col-12 col-sm-auto d-flex align-items-start justify-content-end d-block d-lg-none">
                <button type="button" class="btn btn-icon btn-icon-start btn-outline-primary w-100 w-sm-auto" data-bs-toggle="dropdown">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-gear undefined"><path d="M8.32233 3.75427C8.52487 1.45662 11.776 1.3967 11.898 3.68836C11.9675 4.99415 13.2898 5.76859 14.4394 5.17678C16.4568 4.13815 18.0312 7.02423 16.1709 8.35098C15.111 9.10697 15.0829 10.7051 16.1171 11.4225C17.932 12.6815 16.2552 15.6275 14.273 14.6626C13.1434 14.1128 11.7931 14.9365 11.6777 16.2457C11.4751 18.5434 8.22404 18.6033 8.10202 16.3116C8.03249 15.0059 6.71017 14.2314 5.56062 14.8232C3.54318 15.8619 1.96879 12.9758 3.82906 11.649C4.88905 10.893 4.91709 9.29487 3.88295 8.57749C2.06805 7.31848 3.74476 4.37247 5.72705 5.33737C6.85656 5.88718 8.20692 5.06347 8.32233 3.75427Z"></path><path d="M10 8C11.1046 8 12 8.89543 12 10V10C12 11.1046 11.1046 12 10 12V12C8.89543 12 8 11.1046 8 10V10C8 8.89543 8.89543 8 10 8V8Z"></path></svg>
                  <span>Settings</span>
                </button>
                <!-- Content of below will be moved to #settingsColumn or back in here based on the data-move-breakpoint attribute below -->
                <!-- Content will be here if the screen size is smaller than lg -->

                <!-- In Page Menu Start -->
                <div class="dropdown-menu dropdown-menu-end sw-25 py-3 px-4" id="settingsMoveContent" data-move-target="#settingsColumn" data-move-breakpoint="lg">
                  <div class="mb-2">
                    <a class="nav-link active px-0" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-activity me-2"><path d="M2 10H4.82798C5.04879 10 5.24345 10.1448 5.3069 10.3563L7.10654 16.3551C7.25028 16.8343 7.93071 16.8287 8.06664 16.3473L11.905 2.75299C12.0432 2.26379 12.7384 2.26886 12.8693 2.76003L14.701 9.62883C14.7594 9.84771 14.9576 10 15.1841 10H18"></path></svg>
                      <span class="align-middle">Profile</span>
                    </a>
                    <div>
                      <a class="nav-link active py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Personal</span>
                      </a>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Friends</span>
                      </a>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Account</span>
                      </a>
                    </div>
                  </div>
                  <div class="mb-2">
                    <a class="nav-link px-0" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-inbox me-2"><path d="M18 15V14.6836C18 14.0478 18 13.7299 17.9284 13.4696C17.7414 12.7897 17.2103 12.2586 16.5304 12.0716C16.2701 12 15.9522 12 15.3164 12C15.1025 12 14.9955 12 14.8986 12.0193C14.6476 12.0694 14.4254 12.2139 14.2777 12.4229C14.2206 12.5036 14.1772 12.6013 14.0903 12.7968L14 13C13.8256 13.3924 13.7384 13.5886 13.5935 13.7259C13.5051 13.8097 13.4021 13.8766 13.2897 13.9233C13.1053 14 12.8906 14 12.4612 14H7.53876C7.10937 14 6.89467 14 6.71032 13.9233C6.59788 13.8766 6.49492 13.8097 6.40652 13.7259C6.26159 13.5886 6.17439 13.3924 6 13L5.9097 12.7968L5.9097 12.7968C5.82281 12.6013 5.77937 12.5036 5.72235 12.4229C5.57463 12.2139 5.35238 12.0694 5.10138 12.0193C5.00448 12 4.89751 12 4.68357 12C4.04782 12 3.72994 12 3.46955 12.0716C2.78975 12.2586 2.25862 12.7897 2.07163 13.4696C2 13.7299 2 14.0478 2 14.6836V15C2 15.9319 2 16.3978 2.15224 16.7654C2.35523 17.2554 2.74458 17.6448 3.23463 17.8478C3.60218 18 4.06812 18 5 18H15C15.9319 18 16.3978 18 16.7654 17.8478C17.2554 17.6448 17.6448 17.2554 17.8478 16.7654C18 16.3978 18 15.9319 18 15Z"></path><path d="M16 12V5.5C16 4.09554 16 3.39331 15.6629 2.88886C15.517 2.67048 15.3295 2.48298 15.1111 2.33706C14.6067 2 13.9045 2 12.5 2H7.5C6.09554 2 5.39331 2 4.88886 2.33706C4.67048 2.48298 4.48298 2.67048 4.33706 2.88886C4 3.39331 4 4.09554 4 5.5V12"></path><path d="M7 6H13M7 9H13"></path></svg>
                      <span class="align-middle">Payment</span>
                    </a>
                    <div>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Billing</span>
                      </a>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Invoice</span>
                      </a>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Tax Info</span>
                      </a>
                    </div>
                  </div>
                  <div class="mb-2">
                    <a class="nav-link px-0" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-shield me-2"><path d="M4.35135 3.93668L9.35135 2.22239C9.77177 2.07825 10.2282 2.07825 10.6486 2.22239L15.6486 3.93668C16.457 4.21384 17 4.974 17 5.82857V10.0392C17 12.0175 16.0248 13.8687 14.3932 14.9875L11.1311 17.2244C10.4494 17.6918 9.55055 17.6918 8.86894 17.2244L5.60683 14.9875C3.97522 13.8687 3 12.0175 3 10.0392V5.82857C3 4.974 3.54297 4.21384 4.35135 3.93668Z"></path></svg>
                      <span class="align-middle">Security</span>
                    </a>
                    <div>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Password</span>
                      </a>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Security Log</span>
                      </a>
                      <a class="nav-link py-1 my-1 px-0" href="#">
                        <i class="me-2 sw-2 d-inline-block"></i>
                        <span class="align-middle">Devices</span>
                      </a>
                    </div>
                  </div>
                  <div class="mb-2">
                    <a class="nav-link px-0" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-notification me-2"><path d="M2 7.30318C2 6.37285 2.6415 5.56537 3.54774 5.35499L15.5477 2.56927C16.8016 2.27819 18 3.23023 18 4.51747V12.4825C18 13.7698 16.8016 14.7218 15.5477 14.4307L3.54774 11.645C2.6415 11.4346 2 10.6272 2 9.69682V7.30318Z"></path><path d="M6 12.5L5.88982 13.3281C5.77486 14.1922 5.71738 14.6243 5.80942 14.9938C5.92678 15.4651 6.21159 15.8775 6.6107 16.1542C6.92371 16.3712 7.34811 16.4705 8.19692 16.669V16.669C9.03036 16.864 9.44708 16.9615 9.81891 16.9085C10.293 16.841 10.7272 16.6056 11.0425 16.2451C11.2897 15.9624 11.4354 15.5599 11.7267 14.7551L12 14"></path></svg>
                      <span class="align-middle">Notifications</span>
                    </a>
                  </div>
                  <div class="mb-2">
                    <a class="nav-link px-0" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-tablet me-2"><path d="M3 5.5C3 4.09554 3 3.39331 3.33706 2.88886C3.48298 2.67048 3.67048 2.48298 3.88886 2.33706C4.39331 2 5.09554 2 6.5 2H13.5C14.9045 2 15.6067 2 16.1111 2.33706C16.3295 2.48298 16.517 2.67048 16.6629 2.88886C17 3.39331 17 4.09554 17 5.5V14.5C17 15.9045 17 16.6067 16.6629 17.1111C16.517 17.3295 16.3295 17.517 16.1111 17.6629C15.6067 18 14.9045 18 13.5 18H6.5C5.09554 18 4.39331 18 3.88886 17.6629C3.67048 17.517 3.48298 17.3295 3.33706 17.1111C3 16.6067 3 15.9045 3 14.5V5.5Z"></path><path d="M11 15H10H9"></path></svg>
                      <span class="align-middle">Applications</span>
                    </a>
                  </div>
                </div>
                <!-- In Page Menu End -->
              </div>
              <!-- Top Buttons End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <!-- Public Info Start -->
          <h2 class="small-title">Edit User Info</h2>
          <div class="card mb-5">
            <div class="card-body">
              <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Full Name</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Enter Your Full Name">
                  </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Full Name</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" disabled>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Designation</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="designation" class="form-control" value="{{Auth::user()->designation}}" placeholder="Enter Designation">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Location</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="location" class="form-control" value="{{Auth::user()->location}}" placeholder="Enter Your Location">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Phone</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}" placeholder="Enter Your Phone">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Facebook</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="facebook" class="form-control" value="{{Auth::user()->facebook}}" placeholder="Enter Your Facebook link">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Linkdin</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="linkdin" class="form-control" value="{{Auth::user()->linkdin}}" placeholder="Enter Your Linkdin Link">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Twitter</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="twitter" class="form-control" value="{{Auth::user()->twitter}}" placeholder="Enter Your Twitter">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Github</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="text" name="github" class="form-control" value="{{Auth::user()->github}}" placeholder="Enter Your Github Link">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Bio</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                        <textarea name="bio" id="" cols="20" class="form-control" rows="10">{{Auth::user()->bio}}</textarea>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Upload Photo</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="file" name="image" class="form-control" >
                    </div>
                   
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Upload CV</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="file" name="cv" class="form-control" >
                    </div>
                   
                  </div>

                <div class="mb-3 row mt-5">
                  <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </form>
              @if(!empty(Auth::user()->image))
              <div style="height: 90px;float:left;">
                  <img style="width: 60px; margin-top: 5px;" src="{{asset(Auth::user()->image)}}" >
                  &nbsp;
                  <a class="confirmDelete btn btn-danger btn-sm" record="profileImage" recoedid="{{Auth::user()->id}}" href="javascript:void('0')">Delete</a>
              </div>
            @endif
            @if(!empty(Auth::user()->cv))
            <div style="height: 90px;float:right;">
                <a href="{{asset(Auth::user()->cv)}}" target="_blanck">View Your CV</a>
                &nbsp;
                <a class="confirmDelete btn btn-danger btn-sm" record="profileCV" recoedid="{{Auth::user()->id}}" href="javascript:void('0')">Delete</a>
            </div>
          @endif
            </div>
          </div>
          <!-- Public Info End -->

          <!-- Contact Start -->
          <h2 class="small-title">Change Password</h2>
          <div class="card mb-5">
            <div class="card-body">
              <form action="{{route("admin.update-password")}}" method="post">
                @csrf 
                <div class="mb-3 row">
                  <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Current  Password</label>
                  <div class="col-sm-8 col-md-9 col-lg-10">
                    <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Enter Current Password">
                    <span id="chkPwd"></span>
                  </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">New Password</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="password" class="form-control" name="new_pwd" id="new_pwd" placeholder="Enter New Password">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Confirm New Password</label>
                    <div class="col-sm-8 col-md-9 col-lg-10">
                      <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Enter Confirm New Password">
                    </div>
                  </div>
               
                <div class="mb-3 row mt-5">
                  <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Contact End -->

        </div>
      </div>
    </div>
  </main>
@endsection