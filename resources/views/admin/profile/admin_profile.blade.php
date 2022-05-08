@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <section class="conten">
        <div class="row">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black">
                    <div class="col-lg-12 margin-tb">
                        <div class="float-left">
                            <h3 class="widget-user-username">Name : {{$adminData -> name}}</h3>
                            <h6 class="widget-user-desc">Email : {{$adminData -> email}}</h6>
                        </div>
                        <div class="float-right">
                            <a href="{{route('admin.profile.edit')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="widget-user-image">
                <img class="rounded-circle" 
                  src="{{(!empty($adminData->profile_photo_path)) ? 
                    url('upload/admin_images/'.$adminData->profile_photo_path): url('upload/no_image.png')}}"
                  alt="User Avatar">
                
                </div>
               
              </div>
        </div>
    </section>
</div>
@endsection