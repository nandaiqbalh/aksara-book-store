@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Edit Category</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Form</li>
                              <li class="breadcrumb-item active" aria-current="page">Category</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">


          {{-- EDIT CATEGORY PAGE --}}
          <div class="col-8">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{$categories->id}}">

                        <div class="form-group">
                            <h6>Category Name<span class="text-danger">*</span></h6>
                            <div class="controls">
                                <input id="category_name" type="text" name="category_name" class="form-control" value="{{$categories->category_name}}" > 
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h6>Category Icon<span class="text-danger">*</span></h6>
                            <div class="controls">
                                <input id="category_icon" type="text" name="category_icon" class="form-control" value="{{$categories->category_icon}}" > 
                                    @error('category_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-primary mb-5" value="Update">Update Category</button>
                        </div>

                       </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->

           </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
@endsection