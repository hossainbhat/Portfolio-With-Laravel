@php
    $html_tag_data = [];
    $title = 'Portfolio - Md Hossain Bhat | Project';
    $description= 'Portfolio - Md Hossain Bhat | Project'
@endphp
@extends('frontend.layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('content')
<body class="portfolio">
    <!-- Live Style Switcher Starts - demo only -->
    @include('frontend.layouts._layout.thems')
    
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Header Starts -->
    @include('frontend.layouts._layout.header')
    <!-- Header Ends -->
<!-- Page Title Starts -->
<section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>my <span>portfolio</span></h1>
    <span class="title-bg">works</span>
</section>
<!-- Page Title Ends -->
<!-- Main Content Starts -->
<section class="main-content text-center revealator-slideup revealator-once revealator-delay1">
    <div id="grid-gallery" class="container grid-gallery">
        <!-- Portfolio Grid Starts -->
        <section class="grid-wrap">
            <ul class="row grid">
                <!-- Portfolio Item Starts -->
                <li>
                    <figure>
                        <img src="{{asset('assets/frontend/img/projects/project-1.jpg')}}" alt="Portolio Image" />
                        <div><span>Image Project</span></div>
                    </figure>
                </li>
                <!-- Portfolio Item Ends -->
            
            </ul>
        </section>
        <!-- Portfolio Grid Ends -->
        <!-- Portfolio Details Starts -->
        <section class="slideshow">
            <ul>
                <!-- Portfolio Item Detail Starts -->
                <li>
                    <figure>
                        <!-- Project Details Starts -->
                        <figcaption>
                            <h3>Image Project</h3>
                            <div class="row open-sans-font">
                                <div class="col-12 col-sm-6 mb-2">
                                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">Project </span>: <span class="ft-wt-600 uppercase">Website</span>
                                </div>
                                <div class="col-12 col-sm-6 mb-2">
                                    <i class="fa fa-user-o pr-2"></i><span class="project-label">Client </span>: <span class="ft-wt-600 uppercase">Envato</span>
                                </div>
                                <div class="col-12 col-sm-6 mb-2">
                                    <i class="fa fa-code pr-2"></i><span class="project-label">Langages </span>: <span class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                                </div>
                                <div class="col-12 col-sm-6 mb-2">
                                    <i class="fa fa-external-link pr-2"></i><span class="project-label">Preview </span>: <span class="ft-wt-600 uppercase"><a href="#" target="_blank">www.envato.com</a></span>
                                </div>
                            </div>
                        </figcaption>
                        <!-- Project Details Ends -->
                        <!-- Main Project Content Starts -->
                        <img src="{{asset('assets/frontend/img/projects/project-1.jpg')}}" alt="Portolio Image" />
                        <!-- Main Project Content Ends -->
                    </figure>
                </li>
                <!-- Portfolio Item Detail Ends -->
                
           
            </ul>
            <!-- Portfolio Navigation Starts -->
            <nav>
                <span class="icon nav-prev"><img src="{{asset('assets/frontend/img/projects/navigation/left-arrow.png')}}" alt="previous"></span>
                <span class="icon nav-next"><img src="{{asset('assets/frontend/img/projects/navigation/right-arrow.png')}}" alt="next"></span>
                <span class="nav-close"><img src="{{asset('assets/frontend/img/projects/navigation/close-button.png')}}" alt="close"> </span>
            </nav>
            <!-- Portfolio Navigation Ends -->
        </section>
    </div>
</section>
<!-- Main Content Ends -->

    <!-- Template JS Files -->
    @include('frontend.layouts._layout.js')
    
    </body>

@endsection
