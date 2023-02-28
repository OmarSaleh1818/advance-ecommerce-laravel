@extends('admin.admin_master')
@section('admin')

<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row"> 
		<div class="col-8">

			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Slider Lists</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Slider Image</th>
							<th>Title</th>
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>		
						</tr>
					</thead>
					<tbody>
						@foreach($sliders as $item)
						<tr>
							<td><img src="{{ asset($item->slider_image) }}" alt="" 
							style="width:70px; height:40px"></td>
							<td>
								@if($item->title == NULL)
									<span class="badge badge-pill badge-danger"> No Title </span>
								@else
									{{ $item->title }}
								@endif
							</td>
							<td>
								@if($item->description == NULL)
									<span class="badge badge-pill badge-danger"> No Description </span>
								@else
									{{ $item->description }}
								@endif
							</td>
							<td>
								@if($item->status == 1)
									<span class="badge badge-pill badge-success"> Active </span>
								@else
									<span class="badge badge-pill badge-danger"> InActive </span>
								@endif
							</td>
							<td width="30%">
								<a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('slider.delete', $item->id) }}" class="btn btn-danger btn-sm" title="delete data" id="delete"><i class="fa fa-trash"></i></a>
								@if($item->status == 1)
									<a href="{{ route('slider.inactive', $item->id) }}" class="btn btn-danger btn-sm" title="Inactive data">
										<i class="fa fa-arrow-down"></i></a>
								@else
									<a href="{{ route('slider.active', $item->id) }}" class="btn btn-success btn-sm" title="Active data">
										<i class="fa fa-arrow-up"></i></a>
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


		<!-- Add Brand Page -->

		<div class="col-4">

			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"> Add Slider Image</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
				
				<form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
					@csrf
									

						<div class="form-group">
							<h5>Slider Image <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="file" name="slider_image" class="form-control" required>
								@error('slider_image')
									<span class="text-danger"> {{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="form-group">
							<h5>Slider Title <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text"  name="title" class="form-control" required>
							</div>
						</div>
						
						<div class="form-group">
							<h5>Slider Description <span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text" name="description" class="form-control" required>
							</div>
						</div>
						
					</div>
					<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Slider Image">
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