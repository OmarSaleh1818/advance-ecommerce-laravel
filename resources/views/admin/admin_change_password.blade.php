@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
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
					<form method="post" action="{{ route('admin.update.password') }}">
                        @csrf
					  <div class="row">
						<div class="col-12">						
                            <div class="form-group">
								<h5>Current Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" id="current_password" name="oldpassword" class="form-control" required="" value=""
                                    data-validation-required-message="This field is required"> 
                                </div>
							</div>
							<br>
                            <div class="form-group">
								<h5>New Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password"  id="password" name="newpassword" class="form-control" required="" value=""
                                    data-validation-required-message="This field is required"> 
                                </div>
							</div>
                            <br>
                            <div class="form-group">
								<h5>Confirm Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password"  id="password_confirmation" name="password_confirmation" class="form-control" required="" value=""
                                    data-validation-required-message="This field is required"> 
                                </div>
							</div>
                            <br>
						</div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info" style="margin-left:15px">Change Password</button>
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