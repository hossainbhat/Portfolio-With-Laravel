@php
    $html_tag_data = [];
    $title = 'Portfolio - Md Hossain Bhat | Blog Details';
    $description= 'Portfolio - Md Hossain Bhat - Blog Details'
@endphp
@extends('frontend.layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('content')
<body class="blog-post">
    <!-- Live Style Switcher Starts - demo only -->
    @include('frontend.layouts._layout.thems')
    
    <!-- Live Style Switcher Ends - demo only -->
    <!-- Header Starts -->
    @include('frontend.layouts._layout.header')
    <!-- Header Ends -->
        <!-- Page Title Starts -->
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>my <span>blog</span></h1>
            <span class="title-bg">posts</span>
        </section>
        <!-- Page Title Ends -->
        <!-- Main Content Starts -->
        <section class="main-content revealator-slideup revealator-once revealator-delay1">
            <div class="container">
                <div class="row">
                    <!-- Article Starts -->
                    <article class="col-12">
                        <!-- Meta Starts -->
                        <div class="meta open-sans-font">
                            <span><i class="fa fa-user"></i> steve</span>
                            <span class="date"><i class="fa fa-calendar"></i> 9 January 2017</span>
                            <span><i class="fa fa-tags"></i> wordpress, business, economy, design</span>
                        </div>
                        <!-- Meta Ends -->
                        <!-- Article Content Starts -->
                        <h1 class="text-uppercase text-capitalize">Everything You Need to Know About Web Accessibility</h1>
                        <img src="{{asset('assets/frontend/img/blog/blog-post-1.jpg')}}" class="img-fluid" alt="Blog image"/>
                        <div class="blog-excerpt open-sans-font pb-5">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <!-- Article Content Ends -->
                    </article>
                    <!-- Article Ends -->
                </div>
            </div>
        </section>

    <!-- Template JS Files -->
    @include('frontend.layouts._layout.js')
    
    </body>

@endsection
