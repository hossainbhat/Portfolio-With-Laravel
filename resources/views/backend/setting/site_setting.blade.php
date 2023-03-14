@php
    $html_tag_data = [];
    $title = 'Site Setting';
    $description= 'Site Setting'
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
              <h1 class="mb-0 pb-0 display-4" id="title">Site Setting</h1>
              <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('sitesetting')}}">Site Setting</a></li>
                </ul>
              </nav>
            </div>
            <!-- Title End -->
    
          </div>
        </div>
        <!-- Title and Top Buttons End -->
    
        <div class="row">
         
    
          <!-- Right Side Start -->
          <div class="col-12 col-xl-12 col-xxl-12 mb-5">
            <!-- About Tab Start -->
            <div class="tab-pane">
              <div class="card">
                <div class="card-body">
                    <form class="row g-3" id="siteSettingForm">
                        <div class="col-md-6">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" value="{{@$setting->email}}" id="email" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6">
                          <label for="mobile" class="form-label">Mobile</label>
                          <input type="text" class="form-control" name="mobile" value="{{@$setting->mobile}}" id="mobile" placeholder="Enter Mobile">
                        </div>
                        <div class="col-6">
                          <label for="facebook" class="form-label">Facebook</label>
                          <input type="text" class="form-control" name="facebook" value="{{@$setting->facebook}}" id="facebook" placeholder="Facebook Link">
                        </div>
                        <div class="col-6">
                          <label for="twitter" class="form-label">Twitter</label>
                          <input type="text" class="form-control" id="twitter" value="{{@$setting->twitter}}" name="twitter" placeholder="Twitter Link">
                        </div>
                        <div class="col-6">
                            <label for="youtube" class="form-label">Youtube</label>
                            <input type="text" class="form-control" id="youtube" value="{{@$setting->youtube}}" name="youtube" placeholder="youtube Link">
                        </div>
                        <div class="col-6">
                            <label for="github" class="form-label">Github</label>
                            <input type="text" class="form-control" id="github" value="{{@$setting->github}}" name="github" placeholder="github Link">
                        </div>
                        <div class="col-6">
                            <label for="total_project" class="form-label">Total Project</label>
                            <input type="number" class="form-control" value="{{@$setting->total_project}}" id="total_project" name="total_project" placeholder="total project">
                        </div>
                        <div class="col-6">
                            <label for="experience_year" class="form-label">Experience Year</label>
                            <input type="number" class="form-control" value="{{@$setting->experience_year}}" id="experience_year" name="experience_year" placeholder="experience year">
                        </div>
                        <div class="col-6">
                            <label for="awards" class="form-label">Award</label>
                            <input type="number" class="form-control" value="{{@$setting->awards}}" id="awards" name="awards" placeholder="award">
                        </div>
                        <div class="col-6">
                            <label for="happy_customer" class="form-label">Happy Customer</label>
                            <input type="number" class="form-control" value="{{@$setting->happy_customer}}" id="happy_customer" name="happy_customer" placeholder="happy customer">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="15" rows="3" placeholder="Wrire ...">{{@$setting->description}}</textarea>
                        </div>
                        <div class="col-6">
                            <label for="faveicon" class="form-label">Faveicon &nbsp;&nbsp;<a target="_blanck" href="{{asset(@$setting->fave_icon)}}">View</a></label>
                            <input type="file" class="form-control" id="faveicon" name="fave_icon">
                        </div>
                        <div class="col-6">
                            <label for="logo" class="form-label">Logo &nbsp;&nbsp;<a target="_blanck" href="{{asset(@$setting->logo)}}">View</a></label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                        <div class="col-12">
                          <button type="submit" id="siteSettingUpdateBtn" class="btn btn-primary">Update</button>
                        </div>
                      </form>
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
@section('js')
<script>
  $('#siteSettingUpdateBtn').on('click',function(e) {
      e.preventDefault();

      var formData = new FormData($("#siteSettingForm")[0]);
      // console.log(formData);
      $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: "{{route('sitesetting')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
         console.log(data);
          Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Update Successfully !',
            showConfirmButton: false,
            timer: 1500
          })
         
        },
        error: function(data){
          console.log(data);
        }
      });
  });
</script>
@endsection