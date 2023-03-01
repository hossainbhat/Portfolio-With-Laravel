@php
    $html_tag_data = [];
    $title = 'Portfolio List';
    $description= 'Portfolio List'
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
                <h1 class="mb-0 pb-0 display-4" id="title">Portfolio List</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('portfolio.index')}}">Portfolios</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Title End -->
  
              <!-- Top Buttons Start -->
              <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                <!-- Add New Button Start -->
                <button data-bs-toggle="modal" data-bs-target="#createNewPortfolio" type="button" class="createNewPortfolio btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
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
              <table id="portfolio" class="data-table nowrap w-100">
                
              </table>
            </div>
            <!-- Table End -->
          </div>
          <!-- Content End -->
  
          <!-- Add Modal Start -->
          <div class="modal modal-right fade" id="createNewPortfolio" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modelHeading">Add Porfolio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form  id="add_portfolio_form">
                    <div class="mb-3">
                      <label class="form-label">Project Title</label>
                      <input name="title" placeholder="Enter Project Title" type="text" class="form-control" />
                      <small class="text-danger" id="designationError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Client Name</label>
                        <input name="client_name" placeholder="Enter Client Name" type="text" class="form-control" />
                        <small class="text-danger" id="nameError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Langages</label>
                        <input name="langages" placeholder="Enter Langages" type="text" class="form-control" />
                        <small class="text-danger" id="passing_yearError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Project Type</label>
                        <input name="project_type" placeholder="Enter Project Type" type="text" class="form-control" />
                        <small class="text-danger" id="passing_yearError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Project Link</label>
                        <input name="project_link" placeholder="Enter Project Link" type="text" class="form-control" />
                        <small class="text-danger" id="passing_yearError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input name="image" type="file" class="form-control image" />
                      </div>
                      <div class="float-end imageShow"></div>
                    <div>
                      <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" id="portfolioBtnSave">Create</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Add Modal End -->
        <!-- edit Modal Start -->
        <div class="modal modal-right fade" id="editportfolio" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="update_portfolio_form">
                        <div class="mb-3">
                            <label class="form-label">Project Title</label>
                            <input name="title" placeholder="Enter Project Title" id="edit_title" value="" type="text" class="form-control" />
                            <small class="text-danger" id="designationError"></small>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Client Name</label>
                              <input name="client_name" placeholder="Enter Client Name" id="client_name" value="" type="text" class="form-control" />
                              <small class="text-danger" id="nameError"></small>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Langages</label>
                              <input name="langages" placeholder="Enter Langages" id="langages" value="" type="text" class="form-control" />
                              <small class="text-danger" id="passing_yearError"></small>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Project Type</label>
                              <input name="project_type" placeholder="Enter Project Type" id="project_type" value="" type="text" class="form-control" />
                              <small class="text-danger" id="passing_yearError"></small>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Project Link</label>
                              <input name="project_link" placeholder="Enter Project Link" id="project_link" value="" type="text" class="form-control" />
                              <small class="text-danger" id="passing_yearError"></small>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input name="image" type="file" class="form-control image" />
                          </div>
                          <div class="float-end imageShow"></div>
                        <div>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="portfolioBtnUpdate">Update</button>
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
  var table = $('#portfolio').DataTable({
      processing: true,
      serverSide: true,
      "async": true,
      "crossDomain": true,
      ajax: {
          url : "{{route('portfolio.index')}}",
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        },
      'columns': [
        {
        'title': '#SL', data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
            var pageInfo = table.page.info();
            return (col.row + 1) + pageInfo.start;
        }
      },
      {'title':'Project Title','name':'title','data':'title'},
      {'title':'Project Link','name':'project_link','data':'project_link'},
      {'title':'Image','data': 'image', render: function (data, type, row, col){
          let returnData = '';
        return returnData += "<img src='/"+data+"' width='60' height='60'>";
          }
      },
      {
          'title': 'Action', data: 'id',class: 'text-right w72', width: '20px', render: function (data, type, row, col) {
              let returnData = '';
              returnData += '<a title="Edit" href="javascript:void(0);" data-id="'+data+'" class="text-primary text-center editportfolio"><i class="fs-5 fa-solid fa-pen-to-square"></i></a> &nbsp;';
              returnData += '<a title="Delete" href="javascript:void(0);" data-id="'+data+'" class="text-danger deleteportfolio"><i class="fs-5 fa-solid fa-trash"></i></a>';
              
              return returnData;
          }
      },  
    ],
    columnDefs: [{
        searchable: false,
        orderable: false,
        targets: [0, 3,4]
      }],
      responsive: true,
      autoWidth: false,
      serverSide: true,
      processing: true,
  });
  $(".image").change(function(){
        let reader = new FileReader();
        reader.onload = (e) =>{
        $(".photo_preview").attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
  $(".imageShow").html(`<img class="photo_preview" src="/assets/uploads/portfolio/no-image.png" width="70" height="70">`);

  //create
  $('#portfolioBtnSave').on('click',function(e) {
      e.preventDefault();

      var formData = new FormData($("#add_portfolio_form")[0]);
      // console.log(formData);
      $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: "{{route('portfolio.store')}}",
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
          $('#add_portfolio_form').trigger("reset");
          $('#createNewPortfolio').modal('hide');
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
  $('body').on('click', '.editportfolio', function () {
      $('#experienceBtnUpdate').text("Update");
      var id_portfolio = $(this).data('id');
      var editportfolio = "{{route('portfolio.edit','id_portfolio')}}".replace("id_portfolio",id_portfolio);
      $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "get",
            url: editportfolio,
            success: function (data) {
              $('#editportfolio').modal('show');
              $('#edit_title').val(data.title);
              $('#client_name').val(data.client_name);
              $('#langages').val(data.langages);
              $('#project_type').val(data.project_type);
              $('#project_link').val(data.project_link);
              $(".imageShow").html(`<img class="photo_preview" src="/`+data.image+`" width="70" height="70">`);
              editId = data.id;
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      
  });

  //update
  $('#portfolioBtnUpdate').on('click',function(e) {
    e.preventDefault();
    
    var updateeducation = "{{route('portfolio.update','id_portfolio')}}".replace("id_portfolio",editId);
    var formData = new FormData($("#update_portfolio_form")[0]);
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
            $('#update_project_form').trigger("reset");
            $('#editportfolio').modal('hide');
            table.draw();
        },
        error: function(data){
            console.log(data);
        }
    });
  });
  //delete
 $('body').on('click', '.deleteportfolio', function () {
    
    var portfolio_id = $(this).data("id");
    var portfolioDestroy = "{{route('portfolio.destroy','portfolio_id')}}".replace("portfolio_id",portfolio_id);
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
                url: portfolioDestroy,
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


});
</script>
@endsection