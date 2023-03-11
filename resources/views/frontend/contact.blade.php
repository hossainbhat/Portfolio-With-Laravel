@php
    $html_tag_data = [];
    $title = 'Portfolio - Md Hossain Bhat | Contact Us';
    $description= 'Portfolio - Md Hossain Bhat - contact us'
@endphp
@extends('frontend.layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('content')
<body class="contact">
    <!-- Live Style Switcher Starts - demo only -->
    @include('frontend.layouts._layout.thems')
    
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Header Starts -->
    @include('frontend.layouts._layout.header')
    <!-- Header Ends -->

        <!-- Page Title Starts -->
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>get in <span>touch</span></h1>
            <span class="title-bg">contact</span>
        </section>
        <!-- Page Title Ends -->
        <!-- Main Content Starts -->
        <section class="main-content revealator-slideup revealator-once revealator-delay1">
            <div class="container">
                <div class="row">
                    <!-- Left Side Starts -->
                    <div class="col-12 col-lg-4">
                        <h3 class="text-uppercase custom-title mb-0 ft-wt-600 pb-3">Don't be shy !</h3>
                        <p class="open-sans-font mb-3">{{@$setting->description}}</p>
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fa fa-envelope-open position-absolute"></i>
                            <span class="d-block">mail me</span>{{@$setting->email}}
                        </p>
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fa fa-phone-square position-absolute"></i>
                            <span class="d-block">call me</span>+88 {{@$setting->mobile}}
                        </p>
                        <ul class="social list-unstyled pt-1 mb-5">
                            <li class="facebook"><a target="_blanck" title="Facebook" href="{{@$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="twitter"><a target="_blanck" title="Twitter" href="{{@$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="youtube"><a target="_blanck" title="Youtube" href="{{@$setting->youtube}}"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li class="dribbble"><a target="_blanck" title="Github" href="{{@$setting->github}}"><i class="fa fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Left Side Ends -->
                    <!-- Contact Form Starts -->
                    <div class="col-12 col-lg-8">
                        <form class="contactform" id="EmailContactform">
                            <div class="contactform">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <input type="text" name="name" id="name" placeholder="YOUR NAME">
                                        <p class="text-danger" id="nameError"></p>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="email" name="email" id="email" placeholder="YOUR EMAIL">
                                        <p class="text-danger" id="emailError"></p>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="text" name="subject" id="subject" placeholder="YOUR SUBJECT">
                                        <p class="text-danger" id="subjectError"></p>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="content" id="content" placeholder="YOUR MESSAGE"></textarea>
                                        <p class="text-danger" id="contentError"></p>
                                        <button type="submit" id="saveContactBtn" class="button">
                                            <span class="button-text">Send Message</span>
                                            <span class="button-icon fa fa-send"></span>
                                        </button>
                                    </div>
                                    <div class="col-12 form-message">
                                        <span class="output_message text-center font-weight-600 text-uppercase"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form Ends -->
                </div>
            </div>
        
        </section>

    <!-- Template JS Files -->
    @include('frontend.layouts._layout.js')
    
    </body>

@endsection
@section('js')
<script>
      $('#saveContactBtn').on('click',function(e) {
      e.preventDefault();

        $("#nameError").text('');
        $("#emailError").text('');
        $("#subjectError").text('');
        $("#contentError").text('');

      var formData = new FormData($("#EmailContactform")[0]);
    //   console.log(formData);
      $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: "{{route('contact.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
        //  console.log(data);
        alert("Your Query Send Successfully");
        $('#EmailContactform').trigger("reset");
        },
        error: function(data){
        //   console.log(data);
          $("#nameError").text(data.responseJSON.errors.name);
          $("#emailError").text(data.responseJSON.errors.email);
          $("#subjectError").text(data.responseJSON.errors.subject);
          $("#contentError").text(data.responseJSON.errors.content);
        }
      });
     
  });
</script>
@endsection