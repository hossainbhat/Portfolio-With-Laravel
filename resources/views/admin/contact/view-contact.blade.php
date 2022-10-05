@php
    $html_tag_data = [];
    $title = $contact['subject'];
    $description= 'Email List for Admin';
@endphp
@extends('layouts.admin_layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<main>
    <div class="container">
      <div class="row">
        <!-- Menu Start -->
        @include('layouts.admin_layouts.sitebar')
        <!-- Menu End -->

        <!-- Page Content Start -->
        <div class="col">
            <table class="table table-bordered">
                  
                  <tr>
                    <th scope="col" class="text-center" colspan="2"><h2>Email Details View</h2></th>
                  </tr>
                  <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">{{$contact['name']}}</th>
                  </tr>
                  <tr>
                    <th scope="col">Email</th>
                    <th scope="col">{{$contact['email']}}</th>
                  </tr>
                  <tr>
                    <th scope="col">Email Subject</th>
                    <th scope="col">{{$contact['subject']}}</th>
                  </tr>
                  <tr>
                    <th scope="col">Message</th>
                    <th scope="col">{{$contact['message']}}</th>
                  </tr>
                  <tr>
                    <th scope="col" class="text-center" colspan="2"><a href="{{route('admin.contacts')}}"><button class="btn btn-success btn-sm">Back</button>
                      </a></th>
                  </tr>
                  
              </table>
        </div>
        <!-- Page Content End -->
      </div>
    </div>
  </main>
@endsection
 @section("script_js")

@endsection