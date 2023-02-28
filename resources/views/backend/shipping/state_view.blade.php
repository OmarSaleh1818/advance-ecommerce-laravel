@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">State Lists</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Division Name</th>	
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Action</th>	
							</tr>
						</thead>
						<tbody>
                            @foreach($states as $item)
							<tr>
								<td>{{ $item->division->division_name }}</td>
                                <td>{{ $item->district->district_name }}</td>
                                <td>{{ $item->state_name }}</td>
								<td width="40%">
                                    <a href="{{ route('state.edit', $item->id) }}" class="btn btn-info" 
                                    title="edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('state.delete', $item->id) }}" class="btn btn-danger" 
                                    title="delete data" id="delete"><i class="fa fa-trash"></i></a>
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


            <!-- Add State Page -->

            <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> Add State</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					
                    <form method="post" action="{{ route('state.store') }}">
                        @csrf

                        <div class="form-group">
                            <h5>Select Division<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="division_id" class="form-control" required>
                                    <option value="" selected="" disabled="">Select Division</option>
                                    @foreach($divisions as $div)
                                    <option value="{{ $div->id }}">
                                        {{ $div->division_name }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Select District<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="district_id" class="form-control" required>
                                    <option value="" selected="" disabled="">Select District</option>
                                    @foreach($districts as $dist)
                                    <option value="{{ $dist->id }}">
                                        {{ $dist->district_name }}</option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
					 					
                        <div class="form-group">
                            <h5>State Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text"  name="state_name" class="form-control" required>
                                @error('state_name')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                            
						</div>
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Add State">
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

	<script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change',function() {
                var division_id = $(this).val();
                if(division_id) {
                    $.ajax({
                        url: "{{ url('/division/district/ajax') }}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id + '">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

@endsection