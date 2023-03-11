@php
    $html_tag_data = [];
    $title = 'Forgot-Password | Portfolio - Md Hossain Bhat';
    $description= 'Forgot-Password | Portfolio - Md Hossain Bhat'
@endphp
@extends('backend.layouts.auth',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<div id="root" class="h-100">
    <!-- Background Start -->
    <div class="fixed-background"></div>
    <!-- Background End -->

    <div class="container-fluid p-0 h-100 position-relative">
      <div class="row g-0 h-100">
        <!-- Left Side Start -->
        <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
          <div class="min-h-100 d-flex align-items-center">
            <div class="w-100 w-lg-75 w-xxl-50">
              <div>
                <div class="mb-5">
                  <h1 class="display-3 text-white">Multiple Niches</h1>
                  <h1 class="display-3 text-white">Ready for Your Project</h1>
                </div>
                <p class="h6 text-white lh-1-5 mb-5">
                  Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before
                  process-centric communities...
                </p>
                <div class="mb-5">
                  <a class="btn btn-lg btn-outline-white" href="index.html">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Left Side End -->

        <!-- Right Side Start -->
        <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
          <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
            <div class="sw-lg-50 px-5">
              <div class="sh-11">
                <a href="index.html">
                  <div class="logo-default"></div>
                </a>
              </div>
              <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">Welcome,</h2>
                <h2 class="cta-1 text-primary">let's get started!</h2>
              </div>
              <div class="mb-5">
                <p class="h6">Please use your credentials to login.</p>
                <p class="h6">
                  If you are not a member, please
                  <a href="{{route('admin.login')}}">Login</a>
                  .
                </p>
              </div>
              <div>
                <form id="loginForm" class="tooltip-end-bottom" action="{{route('admin.forgotpassword')}}" method="post">
                  @csrf 
                  <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="email"></i>
                    <input class="form-control" placeholder="Email" value="" name="email" />
                  </div>
                  <button type="submit" id="forgot_btn" class="btn btn-lg btn-primary">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Right Side End -->
      </div>
    </div>
  </div>
@endsection
@section("js")
{{-- <script>
      $(document).ready(function(){
      $("#forgot_btn").on('click', function(e){
        e.preventDefault();

        var email = $("#email").val();

        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url:"{{route('admin.forgotpassword')}}",
          type: 'post',
          data: {
            email:email
          },
          success:function(data){
            if(data.success){
                // console.log("you are login");
                window.location = "{{route('admin.login')}}";
            }else{
              console.log("something want to rong");
            }
            
          }
        });

      });
    });
</script> --}}
@endsection