@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">

		  <div class="row">
			  <div class="col-12 col-lg-5 col-xl-4">
				  
				  <div class="box box-inverse bg-img" style="background-image: url(../images/gallery/full/1.jpg);" data-overlay="2">
					  <div class="flexbox px-20 pt-20">
						
						<div class="dropdown">
						  <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
						  <div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
							<a class="dropdown-item" href="#"><i class="fa fa-picture-o"></i> Shots</a>
							<a class="dropdown-item" href="#"><i class="ti-check"></i> Follow</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Block</a>
						  </div>
						</div>
					  </div>

					  <div class="box-body text-center pb-50">
						<a href="#">
						  <img class="avatar avatar-xxl avatar-bordered" src="{{ asset('upload/profile.png') }}" alt="">
						</a>
						<br>
                        <br>
                        <h4 class="mt-2 mb-0">{{ $adminData->name }}</h4>
						<br>
                        <h4 class="mt-2 mb-0">{{ $adminData->email }}</h4>
                        <br>
                        <br>
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-success mb-5">Edit Profile</a>
					  </div>
					  <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
						<li>
						  <span class="opacity-60">Followers</span><br>
						  <span class="font-size-20">8.6K</span>
						</li>
						<li>
						  <span class="opacity-60">Following</span><br>
						  <span class="font-size-20">8457</span>
						</li>
						<li>
						  <span class="opacity-60">Tweets</span><br>
						  <span class="font-size-20">2154</span>
						</li>
					  </ul>
					</div>	
								

				  <!-- Profile Image -->
                </div>
            </div>

		</section>
    <!-- /.content -->
</div>

@endsection