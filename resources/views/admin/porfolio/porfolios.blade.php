@php
    $html_tag_data = [];
    $title = 'Portfolio';
    $description= 'Portfolio for Admin';
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
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
              <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                  <h1 class="mb-0 pb-0 display-4" id="title">Porfolio List</h1>
                  <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                    <ul class="breadcrumb pt-0">
                      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('admin.porfolios')}}">Porfolios</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                  <!-- Add New Button Start -->
                  <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
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
                <table id="skill" class="data-table nowrap hover">
                  <thead>
                    <tr>
                      <th class="text-muted text-small text-uppercase" width="10%">ID</th>
                      <th class="text-muted text-small text-uppercase">Title</th>
                      <th class="text-muted text-small text-uppercase" width="20%">description</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Image</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Link</th>
                      <th class="text-muted text-small text-uppercase" width="20%">Status</th>
                      <th class="text-muted text-small text-uppercase" width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>Laravel</td>
                        <td>laravel desc</td>
                        <td><img src="" alt="" width="50" height="50"></td>
                        <td>httmps://www.google.com</td>
                        <td>Active</td>
                        <td><a href=""><button class="btn btn-primary btn-sm">Edit</button></a> <a href=""><button class="btn btn-danger btn-sm">Delete</button></a></td>
                    </tr>
                </tbody>
                </table>
              </div>
              <!-- Table End -->
            </div>
            <!-- Content End -->

            <!-- Add Edit Modal Start -->
            <div class="modal modal-right fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="Name" type="text" class="form-control" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Sales</label>
                        <input name="Sales" type="number" class="form-control" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input name="Stock" type="number" class="form-control" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Category</label>
                        <div class="form-check">
                          <input type="radio" id="category1" name="Category" value="Whole Wheat" class="form-check-input" />
                          <label class="form-check-label" for="category1">Whole Wheat</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" id="category2" name="Category" value="Sourdough" class="form-check-input" />
                          <label class="form-check-label" for="category2">Sourdough</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" id="category3" name="Category" value="Multigrain" class="form-check-input" />
                          <label class="form-check-label" for="category3">Multigrain</label>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <div class="form-check">
                          <input type="radio" id="tag1" name="Tag" value="New" class="form-check-input" />
                          <label class="form-check-label" for="tag1">New</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" id="tag2" name="Tag" value="Sale" class="form-check-input" />
                          <label class="form-check-label" for="tag2">Sale</label>
                        </div>
                        <div class="form-check">
                          <input type="radio" id="tag3" name="Tag" value="Done" class="form-check-input" />
                          <label class="form-check-label" for="tag3">Done</label>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="addEditConfirmButton">Add</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add Edit Modal End -->
          </div>
        <!-- Page Content End -->
      </div>
    </div>
  </main>
@endsection
 @section("script_js")
<script>
$(document).ready( function () {
    $('#skill').DataTable();
} );
</script>
@endsection