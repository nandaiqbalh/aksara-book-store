@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('admin')
<div class="container-full">
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Admin Change Password</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

                   <form action="{{route('admin.update.password')}}" method="POST">
                    @csrf
                     <div class="row">
                       <div class="col-6">	
                        <div class="col md-6">
                            <div class="form-group">
                                <h5>Current Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="current_password" type="password" name="old_password" class="form-control" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="password" type="password" name="password" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" > 
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">Update</button>
                            </div>
                        </div>					


                        </div>
                        </div>

                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
</div>

<script type="text/javascript">
    $(document).ready(function(e){
        $('#image').change(function(e){
            var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection