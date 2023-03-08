@php
    $html_tag_data = [];
    $title = 'Portfolio - Md Hossain Bhat | Blog';
    $description = 'Portfolio - Md Hossain Bhat - Blog';
@endphp
@extends('frontend.layouts.master', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])
@section('css')
    <style>
        p.small.text-muted {
            display: none;
        }
    </style>
@endsection
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
                    @if ($blogs->count() > 0)
                        @foreach ($blogs as $blog)
                            <!-- Article Starts -->
                            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                                <article class="post-container">
                                    <div class="post-thumb">
                                        <a href="{{ route('blogdetails', $blog->id) }}"
                                            class="d-block position-relative overflow-hidden">
                                            @if ($blog->image)
                                                <img src="{{ asset($blog->image) }}" class="img-fluid" alt="Blog Post">
                                            @else
                                                <img src="{{ asset('assets/frontend/img/blog/blog-post-1.jpg') }}"
                                                    class="img-fluid" alt="Blog Post">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-header">
                                            <h3><a href="{{ route('blogdetails', $blog->id) }}">{{ $blog->title }}</a></h3>
                                        </div>
                                        <div class="entry-content open-sans-font">
                                            <p>
                                                {{ \Illuminate\Support\Str::limit($blog->content, 100, $end = '...') }}
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- Article Ends -->
                        @endforeach
                    @endif
                    <!-- Pagination Starts -->

                    <div class="col-12 mt-4">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center mb-0">
                                {!! $blogs->withQueryString()->links('pagination::bootstrap-5') !!}

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
