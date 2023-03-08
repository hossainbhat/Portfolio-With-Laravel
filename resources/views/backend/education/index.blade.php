@php
    $html_tag_data = [];
    $title = 'Education List';
    $description= 'Education List'
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
                <h1 class="mb-0 pb-0 display-4" id="title">Education List</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('education.index')}}">Educations</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Title End -->
  
              <!-- Top Buttons Start -->
              <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                <!-- Add New Button Start -->
                <button data-bs-toggle="modal" data-bs-target="#createNewEducation" type="button" class="createNewEducation btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                  <i data-acorn-icon="plus"></i>
                  <span>Add New</span>
                </button>
                <!-- Add New Button End -->
              </div>
              <!-- Top Buttons End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->
  
          <!-- Content Start -->
          <div class="data-table-rows slim">
            <!-- Controls Start -->
           
            <!-- Controls End -->
  
            <!-- Table Start -->
            <div class="data-table-responsive-wrapper">
              <table id="education" class="data-table nowrap w-100">
                
              </table>
            </div>
            <!-- Table End -->
          </div>
          <!-- Content End -->
  
          <!-- Add Modal Start -->
          <div class="modal modal-right fade" id="createNewEducation" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modelHeading">Add Education</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form  id="add_education_form">
                    <div class="mb-3">
                      <label class="form-label">Degree Name</label>
                      <input name="degree_name" placeholder="Enter Degree Name" type="text" class="form-control" />
                      <small class="text-danger" id="designationError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">School / University Name</label>
                        <input name="school_name" placeholder="Enter School / University Name" type="text" class="form-control" />
                        <small class="text-danger" id="nameError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Passing Year</label>
                        <input name="passing_year" placeholder="Enter Passing Year" type="text" class="form-control" />
                        <small class="text-danger" id="passing_yearError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Designation</label>
                        <textarea name="description" cols="20" rows="5" class="form-control" placeholder="Write Description"></textarea>
                        <small class="text-danger" id="descriptionError"></small>
                    </div>
                    <div>
                      <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" id="educationBtnSave">Create</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Add Modal End -->
        <!-- edit Modal Start -->
        <div class="modal modal-right fade" id="editeducation" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Edit Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="update_education_form">
                        <div class="mb-3">
                            <label class="form-label">Degree Name</label>
                            <input name="degree_name" placeholder="Enter Degree name" id="degree_name" value="" type="text" class="form-control" />
                            <small class="text-danger" id="degree_nameError"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">School / University Name</label>
                            <input name="school_name" placeholder="Enter School / University Name" id="school_name" value="" type="text" class="form-control" />
                            <small class="text-danger" id="nameError"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Passing Year</label>
                            <input name="passing_year" placeholder="Enter Passing Year" id="passing_year" value="" type="text" class="form-control" />
                            <small class="text-danger" id="passing_yearError"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <textarea name="description" cols="20" rows="5" class="form-control" id="description" placeholder="Write Description"></textarea>
                            <small class="text-danger" id="descriptionError"></small>
                        </div>
                        <div>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="educationBtnUpdate">Update</button>
                    </div>
                    </form>
                </div>
                
                </div>
            </div>
            </div>
            <!-- edit Modal End -->
   
        </div>
      </div>
    </div>
  </main>
@endsection
@section('js')
<script>
$(function(){
    var editId = 0;
    //list
  var table = $('#education').DataTable({
      processing: true,
      serverSide: true,
      "async": true,
      "crossDomain": true,
      ajax: {
          url : "{{route('education.index')}}",
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        },
      'columns': [
        {
        'title': '#SL', data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
            var pageInfo = table.page.info();
            return (col.row + 1) + pageInfo.start;
        }
      },
      {'title':'Degree Name','name':'degree_name','data':'degree_name'},
      {'title':'School / University','name':'school_name','data':'school_name'},
      {'title':'Passing Year','name':'passing_year','data':'passing_year'},
      {'title':'Status','data': 'status', width:'15%', render: function (data, type, row, col){
        let returnData = '';
       return returnData += (data == 1 ? "<a class='updateEducationStatus' class='btn btn-success btn-sm' id='education-"+row.id+"' education_id='"+row.id+"' href='javascript:void(0)'><button type='button' class='btn btn-success btn-sm'>Active</button></a>" : "<a class='updateEducationStatus' id='education-"+row.id+"' education_id='"+row.id+"' href='javascript:void(0)'><button type='button' class='btn btn-warning btn-sm'>Inactive</button></a>");
        }
      },
      {
          'title': 'Action', data: 'id',class: 'text-right w72', width: '20px', render: function (data, type, row, col) {
              let returnData = '';
              returnData += '<a title="Edit" href="javascript:void(0);" data-id="'+data+'" class="text-primary text-center editeducation"><i class="fs-5 fa-solid fa-pen-to-square"></i></a> &nbsp;';
              returnData += '<a title="Delete" href="javascript:void(0);" data-id="'+data+'" class="text-danger deleteeducation"><i class="fs-5 fa-solid fa-trash"></i></a>';
              
              return returnData;
          }
      },  
    ],
    columnDefs: [{
        searchable: false,
        orderable: false,
        targets: [0, 4,5]
      }],
      responsive: true,
      autoWidth: false,
      serverSide: true,
      processing: true,
  });
  //create
  $('#educationBtnSave').on('click',function(e) {
      e.preventDefault();

      var formData = new FormData($("#add_education_form")[0]);
      // console.log(formData);
      $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: "{{route('education.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
        //  console.log(data);
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: 'education Create Successfully!',
          showConfirmButton: false,
          timer: 1500
        })
          $('#add_education_form').trigger("reset");
          $('#createNewEducation').modal('hide');
          table.draw();
        },
        error: function(data){
          // console.log(data);
        //   $("#titleError").text(data.responseJSON.errors.title);
        //   $("#percentageError").text(data.responseJSON.errors.percentage);
        }
      });
  });

  //edit 
  $('body').on('click', '.editeducation', function () {
      $('#educationBtnUpdate').text("Update");
      var id_education = $(this).data('id');
      var editeducation = "{{route('education.edit','id_education')}}".replace("id_education",id_education);
      $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "get",
            url: editeducation,
            success: function (data) {
              $('#editeducation').modal('show');
              $('#degree_name').val(data.degree_name);
              $('#school_name').val(data.school_name);
              $('#passing_year').val(data.passing_year);
              $('#description').val(data.description);
              editId = data.id;
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      
  });

  //update
  $('#educationBtnUpdate').on('click',function(e) {
    e.preventDefault();
    
    var updateeducation = "{{route('education.update','id_education')}}".replace("id_education",editId);
    var formData = new FormData($("#update_education_form")[0]);
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    // console.log(formData);
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: updateeducation,
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            Toast.fire({
                icon: 'success',
                title: 'education Update successfully'
            })
        //  console.log(data);
            $('#update_education_form').trigger("reset");
            $('#editeducation').modal('hide');
            table.draw();
        },
        error: function(data){
            console.log(data);
        }
    });
  });
  //delete
 $('body').on('click', '.deleteeducation', function () {
    
    var education_id = $(this).data("id");
    var educationDestroy = "{{route('education.destroy','education_id')}}".replace("education_id",education_id);
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
                url: educationDestroy,
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Education Delete Successfully!',
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


 $('body').on('click', '.updateEducationStatus', function () {
      var status = $(this).text();
      var education_id = $(this).attr("education_id");
      $.ajax({
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
          type:"post",
          url:"/admin/update-education-status",
          data:{status:status,education_id:education_id},
          success:function(resp){
              if (resp['status']==0) {
                  $("#education-"+education_id).html("<a class='updateEducationStatus' class='btn btn-warning btn-sm' href='javascript:void(0)'><button type='button' class='btn btn-warning btn-sm'>Inactive</button></a>");
              }else if(resp['status']==1){
                  $("#education-"+education_id).html("<a class='updateEducationStatus' class='btn btn-success btn-sm' href='javascript:void(0)'><button type='button' class='btn btn-success btn-sm'>Active</button></a>");
              }
          },error:function(){
              console.log("Error");
          }
      });
  });


});
</script>
@endsection