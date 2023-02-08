@extends('admin.admin_master')
@section('admin')


<div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 

            <!-- Add Brand Page -->

            <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> Edit District</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					
                    <form method="post" action="{{ route('district.update', $districts->id) }}">
                        @csrf

                            <input type="hidden" name="id" value=" {{ $districts->id }} ">

                            <div class="form-group">
                            <h5>Select Division<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="division_id" class="form-control" >
                                    <option value="" selected="" disabled="">Select Division</option>
                                    @foreach($divisions as $div)
                                    <option value="{{ $div->id }}" {{ $div->id == $districts->division_id ? 'selected' : '' }}>
                                        {{ $div->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
					 					
                            <div class="form-group">
								<h5>District Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"  name="district_name" class="form-control" value="{{ $districts->district_name }}">
                                    @error('district_name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
							</div>
				
						</div>
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update District">
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