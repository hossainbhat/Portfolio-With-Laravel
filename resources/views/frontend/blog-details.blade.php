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
                            <span class="date"><i class="fa fa-calendar"></i> {{ $blog->created_at->format('d/m/Y')}}</span>
                            <span><i class="fa fa-tags"></i> {{$blog->tags}}</span>
                        </div>
                        <!-- Meta Ends -->
                        <!-- Article Content Starts -->
                        <h1 class="text-uppercase text-capitalize">{{$blog->title}}</h1>
                        @if($blog->image)
                        <img src="{{asset($blog->image)}}" class="img-fluid" alt="Blog image"/>
                        @else 
                        <img src="{{asset('assets/frontend/img/blog/blog-post-1.jpg')}}" class="img-fluid" alt="Blog image"/>
                        @endif 
                        <div class="blog-excerpt open-sans-font pb-5">
                            <p>{{$blog->content}}</p>
                        </div>
                        <div id="disqus_thread"></div>
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
@section('js')
<script>
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://portfolio-6ac2qgwmqs.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection
