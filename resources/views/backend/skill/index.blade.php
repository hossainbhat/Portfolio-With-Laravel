@php
    $html_tag_data = [];
    $title = 'Skill List';
    $description= 'Skill List'
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
                <h1 class="mb-0 pb-0 display-4" id="title">Skill List</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('skill.index')}}">Skills</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Title End -->
  
              <!-- Top Buttons Start -->
              <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                <!-- Add New Button Start -->
                <button data-bs-toggle="modal" data-bs-target="#createNewSkill" type="button" class="createNewSkill btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
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
              <table id="skill" class="data-table nowrap w-100">
                
              </table>
            </div>
            <!-- Table End -->
          </div>
          <!-- Content End -->
  
          <!-- Add Modal Start -->
          <div class="modal modal-right fade" id="createNewSkill" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modelHeading">Add Skill</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form  id="add_skill_form">
                    <div class="mb-3">
                      <label class="form-label">Skill Title</label>
                      <input name="title" placeholder="Enter Skill Title" type="text" class="form-control" />
                      <small class="text-danger" id="nameError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Percentage</label>
                        <input name="percentage" placeholder="Enter Percentage" type="text" class="form-control" />
                        <small class="text-danger" id="nameError"></small>
                      </div>
                    <div>
                      <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" id="skillBtnSave">Create</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Add Modal End -->
        <!-- edit Modal Start -->
        <div class="modal modal-right fade" id="editSkill" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Edit Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="update_skill_form">
                    <div class="mb-3">
                        <label class="form-label">Skill Title</label>
                        <input name="title" placeholder="Enter Skill Title" id="edit_title" value="" type="text" class="form-control" />
                        <small class="text-danger" id="nameError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Percentage</label>
                        <input name="percentage" placeholder="Enter Percentage" id="edit_percentage" value="" type="number" class="form-control" />
                        <small class="text-danger" id="nameError"></small>
                        </div>
                    <div>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="skillBtnUpdate">Update</button>
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
  var table = $('#skill').DataTable({
      processing: true,
      serverSide: true,
      "async": true,
      "crossDomain": true,
      ajax: {
          url : "{{route('skill.index')}}",
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        },
      'columns': [
        {
        'title': '#SL', data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
            var pageInfo = table.page.info();
            return (col.row + 1) + pageInfo.start;
        }
      },
      {'title':'Title','name':'title','data':'title'},
      
      {
          'title': 'Percentage', data: 'percentage',class: 'text-right w72', render: function (data, type, row, col) {
              let returnData = '';
              returnData += data+'%';
              
              return returnData;
          }
      },
      {
          'title': 'Action', data: 'id',class: 'text-right w72', width: '20px', render: function (data, type, row, col) {
              let returnData = '';
              returnData += '<a title="Edit" href="javascript:void(0);" data-id="'+data+'" class="text-primary text-center editSkill"><i class="fs-5 fa-solid fa-pen-to-square"></i></a> &nbsp;';
              returnData += '<a title="Delete" href="javascript:void(0);" data-id="'+data+'" class="text-danger deleteSkill"><i class="fs-5 fa-solid fa-trash"></i></a>';
              
              return returnData;
          }
      },  
    ],
    columnDefs: [{
        searchable: false,
        orderable: false,
        targets: [0, 2, 3]
      }],
      responsive: true,
      autoWidth: false,
      serverSide: true,
      processing: true,
  });
  //create
  $('#skillBtnSave').on('click',function(e) {
      e.preventDefault();

      var formData = new FormData($("#add_skill_form")[0]);
      // console.log(formData);
      $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: "{{route('skill.store')}}",
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
          title: 'Skill Create Successfully!',
          showConfirmButton: false,
          timer: 1500
        })
          $('#add_skill_form').trigger("reset");
          $('#createNewSkill').modal('hide');
          table.draw();
        },
        error: function(data){
          // console.log(data);
          $("#titleError").text(data.responseJSON.errors.title);
          $("#percentageError").text(data.responseJSON.errors.percentage);
        }
      });
  });

  //edit 
  $('body').on('click', '.editSkill', function () {
      $('#skillBtnUpdate').text("Update");
      var id_skill = $(this).data('id');
      var editSkill = "{{route('skill.edit','id_skill')}}".replace("id_skill",id_skill);
      $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "get",
            url: editSkill,
            success: function (data) {
              $('#editSkill').modal('show');
              $('#edit_title').val(data.title);
              $('#edit_percentage').val(data.percentage);
              editId = data.id;
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      
  });

  //update
  $('#skillBtnUpdate').on('click',function(e) {
    e.preventDefault();
    
    var updateSkill = "{{route('skill.update','id_skill')}}".replace("id_skill",editId);
    var formData = new FormData($("#update_skill_form")[0]);
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
        url: updateSkill,
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            Toast.fire({
                icon: 'success',
                title: 'Skill Update successfully'
            })
        //  console.log(data);
            $('#update_skill_form').trigger("reset");
            $('#editSkill').modal('hide');
            table.draw();
        },
        error: function(data){
            console.log(data);
        }
    });
  });
  //delete
 $('body').on('click', '.deleteSkill', function () {
    
    var skill_id = $(this).data("id");
    var skillDestroy = "{{route('skill.destroy','skill_id')}}".replace("skill_id",skill_id);
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
                url: skillDestroy,
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Skil Delete Successfully!',
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


});
</script>
@endsection