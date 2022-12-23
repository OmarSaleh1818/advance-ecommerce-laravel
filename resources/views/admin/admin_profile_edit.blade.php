@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('admin.profile.store') }}">
                        @csrf
					  <div class="row">
						<div class="col-12">						
                            <div class="form-group">
								<h5>Admin Name Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}"
                                    data-validation-required-message="This field is required"> 
                                </div>
							</div>
							<br>
							<div class="form-group">
								<h5>Admin Email Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" required="" value="{{ $editData->email }}"
                                    data-validation-required-message="This field is required">
                                </div>       
							</div>
							
							<br>
                            
						</div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info" style="margin-left:15px">Update Profile</button>
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
    <!-- /.content -->
</div>

@endsection