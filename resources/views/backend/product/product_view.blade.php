@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Data Tables</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row"> 
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Manage Products</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Main Image</th>
								<th>Product Name</th>
								<th>Product price</th>
                                <th>Discount price</th>
                                <th>Quantity</th>
                                <th>Status</th>
								<th>Action</th>		
							</tr>
						</thead>
						<tbody>
                            @foreach($products as $item)
							<tr>
								<td><img src="{{ asset($item->product_thambnail) }}" style="width:60px;height:50px"></td>
								<td>{{ $item->product_name_en}}</td>
								<td>{{ $item->selling_price}}</td>
                                <td>{{ $item->discount_price}}</td>
                                <td>{{ $item->product_qty}}</td>
                                <td>
                                    @if($item->status == 1)
                                        <span class="badge badge-pill badge-success"> Active </span>
                                    @else
                                        <span class="badge badge-pill badge-danger"> InActive </span>
                                    @endif
                                </td>
								<td width="30%">
                                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info" title="edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('category.delete', $item->id) }}" class="btn btn-danger" title="delete data" id="delete"><i class="fa fa-trash"></i></a>
                                
                                    @if($item->status == 1)
                                        <a href="{{ route('product.inactive', $item->id) }}" class="btn btn-danger" title="Inactive data">
                                            <i class="fa fa-arrow-down"></i></a>
                                    @else
                                        <a href="{{ route('product.active', $item->id) }}" class="btn btn-success" title="Active data">
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

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>


@endsection