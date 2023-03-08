@php
    $html_tag_data = [];
    $title = 'Blog List';
    $description= 'Blog List'
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
                <h1 class="mb-0 pb-0 display-4" id="title">Blog List</h1>
                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blogs</a></li>
                  </ul>
                </nav>
              </div>
              <!-- Title End -->
  
              <!-- Top Buttons Start -->
              <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                <!-- Add New Button Start -->
                <button data-bs-toggle="modal" data-bs-target="#createNewBlog" type="button" class="createNewBlog btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
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
              <table id="blog" class="data-table nowrap w-100">
                
              </table>
            </div>
            <!-- Table End -->
          </div>
          <!-- Content End -->
  
          <!-- Add Modal Start -->
          <div class="modal modal-right fade" id="createNewBlog" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modelHeading">Add Blog</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form  id="add_blog_form">
                    <div class="mb-3">
                      <label class="form-label">Blog Title</label>
                      <input name="title" placeholder="Enter Blog Title" type="text" class="form-control" />
                      <small class="text-danger" id="blogTitleError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tags</label>
                        <input name="tags" placeholder="Enter tags" type="text" class="form-control" />
                        <small class="text-danger" id="tagsError"></small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" cols="20" rows="5" class="form-control" placeholder="Write Content..."></textarea>
                        <small class="text-danger" id="contentError"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input name="image" type="file" class="form-control image" />
                      </div>
                      <div class="float-end imageShow"></div>
                    <div>
                      <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" id="blogBtnSave">Create</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Add Modal End -->
        <!-- edit Modal Start -->
        <div class="modal modal-right fade" id="editblog" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Edit Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  id="update_blog_form">
                        <div class="mb-3">
                            <label class="form-label">Blog Title</label>
                            <input name="title" placeholder="Enter Blog Title" id="edit_title" value="" type="text" class="form-control" />
                            <small class="text-danger" id="blogError"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <input name="tags" placeholder="Enter tags" id="tags" value="" type="text" class="form-control" />
                            <small class="text-danger" id="tagsError"></small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" id="content" value="" cols="20" rows="5" class="form-control" placeholder="Write Content..."></textarea>
                            <small class="text-danger" id="contentError"></small>
                        </div>
                          <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input name="image" type="file" class="form-control image" />
                          </div>
                          <div class="float-end imageShow"></div>
                        <div>
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="blogBtnUpdate">Update</button>
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
  var table = $('#blog').DataTable({
      processing: true,
      serverSide: true,
      "async": true,
      "crossDomain": true,
      ajax: {
          url : "{{route('blog.index')}}",
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        },
      'columns': [
        {
        'title': '#SL', data: 'id', class: "no-sort", width: '50px', render: function (data, row, type, col) {
            var pageInfo = table.page.info();
            return (col.row + 1) + pageInfo.start;
        }
      },
      {'title':'Blog Title','name':'title','data':'title'},
      {'title':'Image','data': 'image', render: function (data, type, row, col){
          let returnData = '';
        return returnData += "<img src='/"+data+"' width='60' height='60'>";
          }
      },
      {'title':'Status','data': 'status', width:'15%', render: function (data, type, row, col){
        let returnData = '';
       return returnData += (data == 1 ? "<a class='updateBlogStatus' class='btn btn-success btn-sm' id='blog-"+row.id+"' blog_id='"+row.id+"' href='javascript:void(0)'><button type='button' class='btn btn-success btn-sm'>Active</button></a>" : "<a class='updateBlogStatus' id='blog-"+row.id+"' blog_id='"+row.id+"' href='javascript:void(0)'><button type='button' class='btn btn-warning btn-sm'>Inactive</button></a>");
        }
      },
      {
          'title': 'Action', data: 'id',class: 'text-right w72', width: '20px', render: function (data, type, row, col) {
              let returnData = '';
              returnData += '<a title="Edit" href="javascript:void(0);" data-id="'+data+'" class="text-primary text-center editblog"><i class="fs-5 fa-solid fa-pen-to-square"></i></a> &nbsp;';
              returnData += '<a title="Delete" href="javascript:void(0);" data-id="'+data+'" class="text-danger deleteblog"><i class="fs-5 fa-solid fa-trash"></i></a>';
              
              return returnData;
          }
      },  
    ],
    columnDefs: [{
        searchable: false,
        orderable: false,
        targets: [0,2,3,4]
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
  $(".imageShow").html(`<img class="photo_preview" src="/assets/uploads/blog/no-image.png" width="70" height="70">`);

  //create
  $('#blogBtnSave').on('click',function(e) {
      e.preventDefault();

      var formData = new FormData($("#add_blog_form")[0]);
      // console.log(formData);
      $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url: "{{route('blog.store')}}",
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
          $('#add_blog_form').trigger("reset");
          $('#createNewBlog').modal('hide');
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
  $('body').on('click', '.editblog', function () {
      $('#experienceBtnUpdate').text("Update");
      var id_blog = $(this).data('id');
      var editblog = "{{route('blog.edit','id_blog')}}".replace("id_blog",id_blog);
      $.ajax({
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "get",
            url: editblog,
            success: function (data) {
              $('#editblog').modal('show');
              $('#edit_title').val(data.title);
              $('#content').val(data.content);
              $('#tags').val(data.tags);
              $(".imageShow").html(`<img class="photo_preview" src="/`+data.image+`" width="70" height="70">`);
              editId = data.id;
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      
  });

  //update
  $('#blogBtnUpdate').on('click',function(e) {
    e.preventDefault();
    
    var updateeducation = "{{route('blog.update','id_blog')}}".replace("id_blog",editId);
    var formData = new FormData($("#update_blog_form")[0]);
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
            $('#update_Blog_form').trigger("reset");
            $('#editblog').modal('hide');
            table.draw();
        },
        error: function(data){
            console.log(data);
        }
    });
  });
  //delete
 $('body').on('click', '.deleteblog', function () {
    
    var blog_id = $(this).data("id");
    var blogDestroy = "{{route('blog.destroy','blog_id')}}".replace("blog_id",blog_id);
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
                url: blogDestroy,
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Blog Delete Successfully!',
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
 $('body').on('click', '.updateBlogStatus', function () {
      var status = $(this).text();
      var blog_id = $(this).attr("blog_id");
      // console.log(blog_id);
      $.ajax({
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
          type:"post",
          url:"/admin/update-blog-status",
          data:{status:status,blog_id:blog_id},
          success:function(resp){
              if (resp['status']==0) {
                  $("#blog-"+blog_id).html("<a class='updateBlogStatus' class='btn btn-warning btn-sm' href='javascript:void(0)'><button type='button' class='btn btn-warning btn-sm'>Inactive</button></a>");
              }else if(resp['status']==1){
                  $("#blog-"+blog_id).html("<a class='updateBlogStatus' class='btn btn-success btn-sm' href='javascript:void(0)'><button type='button' class='btn btn-success btn-sm'>Active</button></a>");
              }
          },error:function(){
              console.log("Error");
          }
      });
  });


});
</script>
@endsection