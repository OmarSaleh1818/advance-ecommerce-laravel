@extends('frontend.main_master')
@section('content')

@section('title')
@if(session()->get('language') == 'arabic')
الدفع
@else
My Checkout
@endif
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
                    <div class="panel panel-default checkout-step-01">

                        <div id="collapseOne" class="panel-collapse collapse in">

                            <!-- panel-body  -->
                            <div class="panel-body">
                                <div class="row">		

                                    <!-- guest-login -->			
                                    <div class="col-md-6 col-sm-6 already-registered-login">
                                        <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                                        <form class="register-form" role="form">

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
                                                <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="" value="{{ Auth::user()->name }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                                <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="" value="{{ Auth::user()->email }}" required> 
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
                                                <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="" value="{{ Auth::user()->phone }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                                                <input type="text" name="post_code" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="Post Code...." required>
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Notes </label>
                                                <textarea name="notes" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="Notes...."></textarea>
                                            </div>
                                        
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                                        </form>

                                    </div>	
                                    <!-- guest-login -->

                                    <!-- already-registered-login -->
                                    <div class="col-md-6 col-sm-6 already-registered-login">
                                        <h4 class="checkout-subtitle">Already registered?</h4>

                                        <form class="register-form" role="form">

                                            <div class="form-group">
                                                <h5>Select Division<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="division_id" class="form-control unicase-form-control text-input" >
                                                        <option value="" selected="" disabled="">Select Division</option>
                                                        
                                                        <option value="hi">
                                                            </option>
                                                        
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Select District<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="division_id" class="form-control unicase-form-control text-input" >
                                                        <option value="" selected="" disabled="">Select Division</option>
                                                        
                                                        <option value="hi">
                                                            </option>
                                                        
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Select State<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="division_id" class="form-control unicase-form-control text-input" >
                                                        <option value="" selected="" disabled="">Select Division</option>
                                                        
                                                        <option value="hi">
                                                            </option>
                                                        
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                                        </form>

                                    </div>	
                                    <!-- already-registered-login -->		

                                </div>			
                            </div>
                            <!-- panel-body  -->

                        </div><!-- row -->
                    </div>
                    <!-- End checkout-step-01  -->
					   
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
                <div class="checkout-progress-sidebar ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                            </div>
                            <div class="">
                                <ul class="nav nav-checkout-progress list-unstyled">

                                @foreach($carts as $item)
                                    <li>
                                        <strong>Image :</strong>
                                        <img src="{{ asset($item->options->image) }}" style="width:50px; 
                                        height:50px;margin-left:18px;">
                                    </li><br>
                                    <li>
                                        <strong>Product Name :</strong>
                                        {{ $item->name }}
                                    </li><br>
                                    <li>
                                        <strong>Quantity :</strong>
                                        ( {{ $item->qty}} )
                                        <strong style="margin-left:15px">Color :</strong>
                                        {{ $item->options->color}}
                                        @if($item->options->size == NULL)
                                        
                                        @else
                                            <strong style="margin-left:15px">Size :</strong>
                                            {{ $item->options->size}}
                                        @endif
                                    </li>
                                    <hr>
                                @endforeach
                               
                                    <li>
                                        @if(Session::has('coupon'))
                                            <strong>SubTotal : <span style="color:blue"> {{ $cartTotal }} SR</span></strong><hr>

                                            <strong>Coupon Name : </strong>{{ session()->get('coupon')['coupon_name'] }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                             <hr>
                                             <strong>Coupon Discount : <span style="color:blue">{{ session()->get('coupon')['discount_amount'] }} SR</span></strong>
                                             <hr>
                                             <strong>Grand Total : <span style="color:blue">{{ session()->get('coupon')['total_amount'] }} SR</span></strong>
                                             <hr>
                                        @else
                                            <strong>SubTotal : <span style="color:blue">{{ $cartTotal }} SR</span</strong>><hr>

                                            <strong>Grand Total : <span style="color:blue">{{ $cartTotal }} SR</span></strong>
                                            <hr>
                                        @endif

                                    </li>
                                </ul>		
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- checkout-progress-sidebar -->				
            </div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
    </div>
</div>

<!-- ============================================== BRANDS CAROUSEL ============================================== -->

@include('frontend.body.brands')

<!-- /.logo-slider --> 
<!-- ============================================== BRANDS CAROUSEL : END ========================================= -->



@endsection