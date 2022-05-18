@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">All Books</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Tables</li>
                              <li class="breadcrumb-item active" aria-current="page">Book List</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Book List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th class="text-center" scope="col" width="15%">Image</th>
                              <th class="text-center" scope="col" width="18%">Book Name</th>
                              <th class="text-center" scope="col" width="18%">Book Author</th>
                              <th class="text-center" scope="col" width="8%">Language</th>
                              <th class="text-center" scope="col" width="8%">Status</th>
                              <th class="text-center" scope="col" width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($books as $book)
                          <tr>
                            <td>
                                <img src="{{asset($book->book_image)}}" style="height: 85px; weight:85px" alt="">
                            </td>
                            <td>{{$book -> book_name}}</td>
                            <td>{{$book -> book_author}}</td>
                            <td>{{$book -> book_language}}</td>
                            <td>
                              @if ($book -> status == 1)
                                  <span class="badge badge-pill badge-success">Active</span>
                              @else
                                 <span class="badge badge-pill badge-danger">Inactive</span>

                              @endif

                            </td>
                            <td>
                                <a href="{{route('book.edit', $book -> id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('book.delete', $book -> id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                @if ($book -> status == 1)
                                    <a href="{{route('book.inactive', $book -> id)}}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                @else
                                    <a href="{{route('book.active', $book -> id)}}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>

                                @endif
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

      </section>
      <!-- /.content -->
    </div>
@endsection