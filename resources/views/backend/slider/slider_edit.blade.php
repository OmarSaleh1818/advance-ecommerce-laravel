@extends('admin.admin_master')
@section('admin')

<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row"> 
	
		<!-- Add Brand Page -->

		<div class="col-12">

			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"> Edit Slider Image</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				
				<form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
					@csrf
									
						<input type="hidden" name="id" value="{{ $slider->id }}" >
						<input type="hidden" name="old_image" value="{{ $slider->slider_image }}" >

						<div class="form-group">
							<h5>Slider Image <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="file" name="slider_image" class="form-control" value="{{ $slider->slider_image}}">
								@error('slider_image')
									<span class="text-danger"> {{ $message }}</span>
								@enderror
							</div>
						</div>

						<div class="form-group">
							<h5>Slider Title <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text"  name="title" class="form-control" value="{{ $slider->title }}">
								
							</div>
						</div>
						
						<div class="form-group">
							<h5> Slider Description <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="description" class="form-control" value="{{ $slider->description }}">
								
							</div>
						</div>
						
					</div>
					<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Slider Image">
					</div>
				</form>

				</div>
			</div>
			<!-- /.box-body -->
			</div>
			<!-- /.box -->
		
		</div>
		<!-- /.col -->


		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
	
	</div>


@endsection