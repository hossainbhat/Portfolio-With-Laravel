<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
@isset($html_tag_data)
    @foreach ($html_tag_data as $key=> $value) data-{{$key}}='{{$value}}' @endforeach
@endisset
>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name') }} | {{$title}}</title>
    <meta name="description" content="{{$description}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include("backend.layouts._layout.css")
    @yield("css")
  </head>

  <body>
    <div id="root">
      @include("backend.layouts._layout.sitebar")

      @yield("content")
      <!-- Layout Footer Start -->
    @include("backend.layouts._layout.footer")

      <!-- Layout Footer End -->
    </div>

  
    @include("backend.layouts._layout.thems")

    @include("backend.layouts._layout.js")
    @yield("js")
    <!-- Page Specific Scripts End -->
  </body>
</html>
