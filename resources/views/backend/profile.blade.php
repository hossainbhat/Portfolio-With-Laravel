@php
    $html_tag_data = [];
    $title = 'Profile';
    $description= 'Profile'
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
              <button type="button" data-bs-toggle="modal" data-bs-target="#editProfileModal" class="btn btn-outline-primary btn-sm">
                <i data-acorn-icon="edit-square"></i>
              </button> &nbsp; 
              <button type="button" data-bs-toggle="modal" data-bs-target="#changePasswordModal" class="btn btn-outline-primary btn-sm">
                <i class="fa-solid fa-lock"></i>
              </button>
            </div>
            <!-- Top Buttons End -->
          </div>
        </div>
        <!-- Title and Top Buttons End -->
    
        <div class="row">
          <!-- Left Side Start -->
          <div class="col-12 col-xl-3 col-xxl-2">
            <!-- Biography Start -->
            <h2 class="small-title">Profile</h2>
            <div class="card mb-5">
              <div class="card-body">
                <div class="d-flex align-items-center flex-column mb-4">
                  <div class="d-flex align-items-center flex-column">
                    <div class="sw-13 position-relative mb-3">
                      @if(auth()->user()->image)
                      <img src="{{asset(auth()->user()->image)}}" class="img-fluid rounded-xl" alt="thumb" />
                      @else
                      <img src="{{asset('assets/backend/img/profile/profile-1.webp')}}" class="img-fluid rounded-xl" alt="thumb" />
                      @endif 
                    </div>
                    <div class="h5 mb-0">{{Auth::user()->name}}</div>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- Biography End -->
          </div>
          <!-- Left Side End -->
    
          <!-- Right Side Start -->
          <div class="col-12 col-xl-9 col-xxl-10 mb-5">
            <!-- About Tab Start -->
            <div class="tab-pane">
              <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                          <tr>
                            <th colspan="4" class="text-center">Profile Information</th>
                          </tr>
                          <tr>
                            <th width="20%">Name</th>
                            <td>{{Auth::user()->name}}</td>
                            <th width="20%">Email</th>
                            <td>{{Auth::user()->email}}</td>
                          </tr>
                          <tr>
                            <th width="20%">Mobile</th>
                            <td>{{Auth::user()->mobile}}</td>
                            <th width="20%">Age</th>
                            <td>{{Auth::user()->age}}</td>
                          </tr>
                          <tr>
                            <th width="20%">Designation</th>
                            <td>{{Auth::user()->designation}}</td>
                            <th width="20%">Skype</th>
                            <td>{{Auth::user()->skype}}</td>
                          </tr>
                          <tr>
                            <th width="20%">Freelance</th>
                            <td>{{Auth::user()->freelance}}</td>
                            <th width="20%">Nationality</th>
                            <td>{{Auth::user()->nationality}}</td>
                          </tr>
                          <tr>
                            <th width="20%">Address</th>
                            <td colspan="3">{{Auth::user()->address}}</td>
                          </tr>
                          <tr>
                            <th width="20%">CV</th>
                            <td colspan="3"><a target="__blanck" href="{{asset(Auth::user()->upload_cv)}}"><i style="font-size: 20px" class="fa-solid fa-file-pdf"></i></a></td>
                          </tr>
                          <tr>
                            <th width="20%">Bio</th>
                            <td colspan="3">{{Auth::user()->description}}</td>
                          </tr>
                          
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
            <!-- About Tab End -->
          </div>
          <!-- Right Side End -->
        </div>
      </div>
    
      <!-- edit profile Modal -->
      <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabelDefault">Edit Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="userProfileForm">
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" placeholder="Your Fast Name" class="form-control">
                <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" name="name" id="name" value="{{Auth::user()->name}}"  placeholder="Your Fast Name" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" id="email" value="{{Auth::user()->email}}" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Designation</label>
                  <input type="text" name="designation" id="designation" value="{{Auth::user()->designation}}"   placeholder="Your Designation" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Mobile</label>
                  <input type="text" name="mobile" id="mobile" value="{{Auth::user()->mobile}}"   placeholder="Your Mobile" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Age</label>
                  <input type="text" name="age" id="age" value="{{Auth::user()->age}}"   placeholder="Your Age" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Skype</label>
                  <input type="text" name="skype" id="skype" value="{{Auth::user()->skype}}"   placeholder="Your Skype" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Freelance</label>
                  <input type="text" name="freelance" id="freelance" value="{{Auth::user()->freelance}}" placeholder="Your Freelance" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Nationality</label>
                  <input type="text" name="nationality" id="nationality" value="{{Auth::user()->nationality}}" placeholder="Your Nationality" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Address</label>
                  <textarea name="address" id="address" placeholder="Your Address..." class="form-control" rows="3">{{Auth::user()->address}}</textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Bio</label>
                  <textarea name="description" id="description" placeholder="Your Bio..." class="form-control" rows="3">{{Auth::user()->description}}</textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">CV Upload &nbsp;&nbsp;<a target="_blanck" href="{{asset(Auth::user()->upload_cv)}}">View Link</a></label>
                  <input type="file" name="upload_cv" id="upload_cv" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Photo Upload &nbsp;&nbsp;<a target="_blanck" href="{{asset(Auth::user()->image)}}">View Link</a></label>
                  <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" id="profileUpdateBtn" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
        <!-- end edit profile Modal -->
      <!-- change password Modal -->
      <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabelDefault">Change Password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="changePasswordForm">
                <div class="mb-3">
                  <label class="form-label">Current Password</label>
                  <input type="password" name="current_pwd" id="current_pwd" placeholder="Current Password" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">New Password</label>
                  <input type="password" name="new_pwd" id="new_pwd" placeholder="New Password" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Confirm New Password</label>
                  <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm New Password" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary" id="passwordUpdateBtn">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--end change password Modal -->
</main>
@endsection
@section('js')
<script>

$(function(){
  //  ........... update profile ...........
  $('#profileUpdateBtn').on('click',function(e) {
      e.preventDefault();

      var formData = new FormData($("#userProfileForm")[0]);
      // console.log(formData);
      $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: "{{route('admin.profile')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
      //    console.log(data);
          Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Profile Update Successfully !',
            showConfirmButton: false,
            timer: 1500
          })
          $('#editProfileModal').modal('hide');
        },
        error: function(data){
          console.log(data);
        }
      });
  });
  //............. change password .............
  $('#passwordUpdateBtn').on('click',function(e) {
    e.preventDefault();

    var formData = new FormData($("#changePasswordForm")[0]);
    // console.log(formData);
    $.ajax({
      headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      type:'POST',
      url: "{{route('admin.updatePassword')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {
      //  console.log(data);
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: 'Password Update Successfully !',
          showConfirmButton: false,
          timer: 1500
        })
        $('#changePasswordForm').trigger("reset");
        $('#changePasswordModal').modal('hide');
      },
      error: function(data){
        console.log(data);
      }
    });
  });


});
</script>
@endsection