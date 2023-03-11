@php
    $html_tag_data = [];
    $title = 'Portfolio - Md Hossain Bhat | About';
    $description= 'Ecommerce Dashboard'
@endphp
@extends('frontend.layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('content')
<body class="about">
    <!-- Live Style Switcher Starts - demo only -->
    @include('frontend.layouts._layout.thems')
    
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Header Starts -->
    @include('frontend.layouts._layout.header')
    <!-- Header Ends -->
    <!-- Page Title Starts -->
    <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
        <h1>ABOUT <span>ME</span></h1>
        <span class="title-bg">Resume</span>
    </section>
    <!-- Page Title Ends -->
    <!-- Main Content Starts -->
    <section class="main-content revealator-slideup revealator-once revealator-delay1">
        <div class="container">
            <div class="row">
                <!-- Personal Info Starts -->
                <div class="col-12 col-lg-5 col-xl-6">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-uppercase custom-title mb-0 ft-wt-600">personal infos</h3>
                        </div>
                        <div class="col-12 d-block d-sm-none">
                            <img src="{{asset('assets/frontend/img/img-mobile.jpg')}}" class="img-fluid main-img-mobile" alt="my picture" />
                        </div>
                        <div class="col-6">
                            <ul class="about-list list-unstyled open-sans-font">
                                <li> <span class="title">Full Name :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">Md. {{$user->name}}</span> </li>
                                <li> <span class="title">Email :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->email}}</span> </li>
                                <li> <span class="title">Age :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->age}} Years</span> </li>
                                <li> <span class="title">Address :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->address}}</span> </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="about-list list-unstyled open-sans-font">
                                <li> <span class="title">phone :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">+88{{$user->mobile}}</span> </li>
                                <li> <span class="title">Skype :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->skype}}</span> </li>
                                <li> <span class="title">Freelance :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->freelance}}</span> </li>
                                <li> <span class="title">Nationality :</span> <span class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->nationality}}</span> </li>
                            </ul>
                        </div>
                        <div class="col-12 mt-3">
                            <a class="button" href="{{$user->upload_cv}}" target="_blanck">
                                <span class="button-text">Download CV</span>
                                <span class="button-icon fa fa-download"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Personal Info Ends -->
                <!-- Boxes Starts -->
                <div class="col-12 col-lg-7 col-xl-6 mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-6">
                            <div class="box-stats with-margin">
                                <h3 class="poppins-font position-relative">{{@$setting->experience_year}}</h3>
                                <p class="open-sans-font m-0 position-relative text-uppercase">years of <span class="d-block">experience</span></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box-stats with-margin">
                                <h3 class="poppins-font position-relative">{{@$setting->total_project}}</h3>
                                <p class="open-sans-font m-0 position-relative text-uppercase">completed <span class="d-block">projects</span></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box-stats">
                                <h3 class="poppins-font position-relative">{{@$setting->happy_customer}}</h3>
                                <p class="open-sans-font m-0 position-relative text-uppercase">Happy<span class="d-block">customers</span></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box-stats">
                                <h3 class="poppins-font position-relative">{{@$setting->awards}}</h3>
                                <p class="open-sans-font m-0 position-relative text-uppercase">awards <span class="d-block">won</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Boxes Ends -->
            </div>
            <hr class="separator">
            <!-- Skills Starts -->
            <div class="row">
                <div class="col-12">
                    <h3 class="text-uppercase pb-4 pb-sm-5 mb-3 mb-sm-0 text-left text-sm-center custom-title ft-wt-600">My Skills</h3>
                </div>
                @if($skills->count() >0)
                @foreach ($skills as $skill)
                <div class="col-6 col-md-3 mb-3 mb-sm-5">
                    <div class="c100 p{{$skill->percentage}}">
                        <span>{{$skill->percentage}}%</span>
                        <div class="slice">
                            <div class="bar"></div>
                            <div class="fill"></div>
                        </div>
                    </div>
                    <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">{{$skill->title}}</h6>
                </div>
                @endforeach
                @endif
                
            </div>
            <!-- Skills Ends -->
            <hr class="separator mt-1">
            <!-- Experience & Education Starts -->
            <div class="row">
                <div class="col-12">
                    <h3 class="text-uppercase pb-5 mb-0 text-left text-sm-center custom-title ft-wt-600">Experience <span>&</span> Education</h3>
                </div>
                <div class="col-lg-6 m-15px-tb">
                    <div class="resume-box">
                        <ul>
                            @if($experiences->count() >0)
                            @foreach ($experiences as $item)
                            <li>
                                <div class="icon">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <span class="time open-sans-font text-uppercase">{{$item->passing_year}}</span>
                                <h5 class="poppins-font text-uppercase">{{$item->designation}} <span class="place open-sans-font">{{$item->company_name}}</span></h5>
                                <p class="open-sans-font">{{$item->description}} </p>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 m-15px-tb">
                    <div class="resume-box">
                        <ul>
                            @if($education->count() >0)
                                @foreach ($education as $item)
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <span class="time open-sans-font text-uppercase">{{$item->passing_year}}</span>
                                    <h5 class="poppins-font text-uppercase">{{$item->degree_name}} <span class="place open-sans-font">{{$item->school_name}}</span></h5>
                                    <p class="open-sans-font">{{$item->description}}</p>
                                </li>
                                @endforeach
                            @endif 
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Experience & Education Ends -->
        </div>
    </section>
    <!-- Main Content Ends -->
    
    <!-- Template JS Files -->
    @include('frontend.layouts._layout.js')
    
    </body>
    
@endsection