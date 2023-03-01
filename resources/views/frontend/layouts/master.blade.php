<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
@isset($html_tag_data)
    @foreach ($html_tag_data as $key=> $value) data-{{$key}}='{{$value}}' @endforeach
@endisset
>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | {{$title}}</title>
    <meta name="description" content="{{$description}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('frontend.layouts._layout.css')
</head>

@yield('content')

</html>
