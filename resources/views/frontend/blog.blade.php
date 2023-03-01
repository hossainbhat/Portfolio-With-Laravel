@php
    $html_tag_data = [];
    $title = 'Portfolio - Md Hossain Bhat | Blog';
    $description= 'Portfolio - Md Hossain Bhat - Blog'
@endphp
@extends('frontend.layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('content')
<body class="blog">
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
                <!-- Articles Starts -->
                <div class="row">
                    <!-- Article Starts -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                        <article class="post-container">
                            <div class="post-thumb">
                                <a href="blog-post.html" class="d-block position-relative overflow-hidden">
                                    <img src="{{asset('assets/frontend/img/blog/blog-post-1.jpg')}}" class="img-fluid" alt="Blog Post">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="entry-header">
                                    <h3><a href="blog-post.html">How to Own Your Audience by Creating an Email List</a></h3>
                                </div>
                                <div class="entry-content open-sans-font">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Article Ends -->
          
                    <!-- Pagination Starts -->
                    <div class="col-12 mt-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination Ends -->
                </div>
                <!-- Articles Ends -->
            </div>
        
        </section>

    <!-- Template JS Files -->
    @include('frontend.layouts._layout.js')
    
    </body>

@endsection
