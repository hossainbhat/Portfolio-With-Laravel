@php
    $html_tag_data = [];
    $title = 'Mail List';
    $description= 'Mail List'
@endphp
@extends('backend.layouts.master',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section("content")
<main>
    <div class="container">
      <div class="row">
        <div class="col">
          <!-- Title and Top Buttons Start -->
          <div class="page-title-container">
            <div class="row">
              <!-- Title Start -->
              <div class="col-12 col-md-7">
                <h1 class="mb-0 pb-0 display-4" id="title">Mail List</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('contact.index')}}">Mails</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Title End -->
  
            </div>
          </div>
          <!-- Title and Top Buttons End -->
  
          <!-- Content Start -->
          <div class="data-table-rows slim">
            <!-- Controls Start -->
           
            <!-- Controls End -->
  
            <!-- Table Start -->
            <div class="data-table-responsive-wrapper">
              <table id="contact" class="data-table nowrap w-100">
                
              </table>
            </div>
            <!-- Table End -->
          </div>
          <!-- Content End -->
      </div>
    </div>
  </main>
  {{--start view detals --}}
  <div class="modal fade" id="viewContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelDefault">View Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered table-hover" id="contactDetails">
            
          </table>
        </div>
      </div>
    </div>
  </div>
  {{-- end view detals --}}
  {{-- start view replay form --}}
  <div class="modal fade" id="replayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelDefault">Replay Mail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="contactReplayForm">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" readonly id="name" value=""  placeholder="Your Fast Name" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" readonly id="email" value="" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Subject</label>
              <input type="text" name="subject" id="subject" value=""   placeholder="Your subject" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea name="content" id="content" placeholder="Your Message..." class="form-control" rows="3"></textarea>
            </div>
          
            <button type="submit" id="replayBtn" class="btn btn-primary">Replay</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  {{-- end view replay form --}}
@endsection
@section('js')
<script>
$(function(){
    var editId = 0;
    //list
  var table = $('#contact').DataTable({
      processing: true,
      serverSide: true,
      "async": true,
      "crossDomain": true,
      ajax: {
          url : "{{route('contact.index')}}",
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        },
      'columns': [
        {
        'title': '#SL', data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
            var pageInfo = table.page.info();
            return (col.row + 1) + pageInfo.start;
        }
      },
      {'title':'Name','name':'name','data':'name'},
      {'title':'Email','name':'email','data':'email'},
      {'title':'Subject','name':'subject','data':'subject'},
      {
          'title': 'Action', data: 'id',class: 'text-right w72', width: '20px', render: function (data, type, row, col) {
              let returnData = '';
              returnData += '<a title="View" href="javascript:void(0);" data-id="'+data+'" class="text-info viewContact"><i class="fs-5 fa-solid fa-eye"></i></a>&nbsp;&nbsp;&nbsp;';
              returnData += '<a title="Email" href="javascript:void(0);" data-id="'+data+'" class="text-primary replayContact"><i class="fs-5 fa-solid fa-envelope"></i></a>&nbsp;&nbsp;&nbsp;';
              returnData += '<a title="Delete" href="javascript:void(0);" data-id="'+data+'" class="text-danger deleteContact"><i class="fs-5 fa-solid fa-trash"></i></a>';
              
              return returnData;
          }
      },  
    ],
    columnDefs: [{
        searchable: false,
        orderable: false,
        targets: [0,1,3,4]
      }],
      responsive: true,
      autoWidth: false,
      serverSide: true,
      processing: true,
  });

  //delete
 $('body').on('click', '.deleteContact', function () {
    
    var contact_id = $(this).data("id");
    var contactDestroy = "{{route('contact.destroy','contact_id')}}".replace("contact_id",contact_id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: contactDestroy,
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Email Delete Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                
                table.draw()
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    })

 });

 $(document).on('click', '.viewContact', function () {
    
    var contact_id = $(this).data("id");
    // console.log(contact_id);
    var contactView = "{{route('contact.show','contact_id')}}".replace("contact_id",contact_id);

    $.ajax({
          type: "get",
          url: contactView,
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
          success: function (data) {
            $("#contactDetails").html(`
            <tbody>
              <tr>
                <th width="20%">Name</th>
                <td>${data.name}</td>
              </tr>
              <tr>
                <th width="20%">Email</th>
                <td>${data.email}</td>
              </tr>
              <tr>
                <th width="20%">Subject</th>
                <td>${data.subject}</td>
              </tr>
              <tr>
                <th width="20%">Message</th>
                <td>${data.content}</td>
              </tr>
            </tbody>
            `);
            $('#viewContactModal').modal('show');
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });

 });

 $(document).on('click', '.replayContact', function () {
    
    var contact_id = $(this).data("id");
    // console.log(contact_id);
    var contactReplay = "{{route('contact.replay','contact_id')}}".replace("contact_id",contact_id);

    $.ajax({
      type: "get",
      url: contactReplay,
      headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      success: function (data) {
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#subject').val(data.subject);
        $('#replayModal').modal('show');
      },
      error: function (data) {
          console.log('Error:', data);
      }
    });

 });


});
</script>
@endsection