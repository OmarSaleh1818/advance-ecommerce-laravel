@extends('admin.admin_master')
@section('admin')

<div class="container-full">

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Category Lists</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category Icon</th>
								<th>Category English</th>
								<th>Category Arabic</th>
								<th>Action</th>		
							</tr>
						</thead>
						<tbody>
                            @foreach($category as $item)
							<tr>
								<td><span><i class="{{$item->category_icon}}"></i></span></td>
								<td>{{ $item->category_name_en}}</td>
								<td>{{ $item->category_name_ar}}</td>
								<td width="30%">
                                    <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info" title="edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger" title="delete data" id="delete"><i class="fa fa-trash"></i></a>
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
				  <h3 class="box-title"> Add Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					
                    <form method="post" action="{{ route('category.store') }}">
                        @csrf
					 					
                            <div class="form-group">
								<h5>Category Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"  name="category_name_en" class="form-control" required>
                                    @error('category_name_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
							</div>
							
                            <div class="form-group">
								<h5>Category Name Arabic <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="category_name_ar" class="form-control" required>
                                    @error('category_name_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
							</div>
                            
                            <div class="form-group">
								<h5>Category Icon <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="category_icon" class="form-control" required>
                                    @error('category_icon')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
							</div>
                         
                            
						</div>
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Category">
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