@extends('admin.admin_master')

@section('admin')
<div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">All Category</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Tables</li>
                              <li class="breadcrumb-item active" aria-current="page">Category List</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Category List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th class="text-center" scope="col" width="10%">Category Name</th>
                              <th class="text-center" scope="col" width="20%">Icon</th>
                              <th class="text-center" scope="col" width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $category)
                          <tr>
                            <td>{{$category -> category_name}}</td>
                            <td>
                                <span>
                                    <i class="{{$category -> category_icon}}"></i>    
                                </span>                            
                            <td>
                                <a href="" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a href="" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>      
                          @endforeach
                        </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <!-- /.col -->

          {{-- ADD CATEGORY PAGE --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Category Name<span class="text-danger">*</span></label>
                            <div class="controls">
                                <input id="category_name" type="text" name="category_name" class="form-control" > 
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Category Icon<span class="text-danger">*</span></label>
                            <div class="controls">
                                <input id="category_icon" type="text" name="category_icon" class="form-control" >                                @error('category_icon')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-primary mb-5">Add Category</button>
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