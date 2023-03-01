@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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

    <form class="register-form" action="{{ route('checkout.store') }}" method="post">
        @csrf

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b> <span>*</span></label>
                                                <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="" value="{{ Auth::user()->name }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>Email</b>  <span>*</span></label>
                                                <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="" value="{{ Auth::user()->email }}" required> 
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>Phone</b>  <span>*</span></label>
                                                <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="" value="{{ Auth::user()->phone }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1"><b>Post Code</b>  <span>*</span></label>
                                                <input type="text" name="post_code" class="form-control unicase-form-control text-input" 
                                                id="exampleInputEmail1" placeholder="Post Code...." required>
                                            </div>

                                    </div>	
                                    <!-- guest-login -->

                                    <!-- already-registered-login -->
                                    <div class="col-md-6 col-sm-6 already-registered-login">

                                        <div class="form-group">
                                            <h5><b>Select Division</b> <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="division_id" class="form-control unicase-form-control text-input" >
                                                    <option value="" selected="" disabled=""><b>Select Division</option>
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
                                            <h5><b>Select District</b> <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="district_id" class="form-control unicase-form-control text-input" >
                                                    <option value="" selected="" disabled=""><b>Select District</option>
                                                    @foreach($districts as $dist)
                                                        <option value="{{ $dist->id }}">
                                                            {{ $dist->district_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('district_id')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5><b>Select State</b> <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="state_id" class="form-control unicase-form-control text-input" >
                                                    <option value="" selected="" disabled="">Select State</option>
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->id }}">
                                                        {{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('state_id')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1"><b>Notes</b> </label>
                                            <textarea name="notes" class="form-control unicase-form-control text-input" 
                                            id="exampleInputEmail1" placeholder="Notes...."></textarea>
                                        </div>

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
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                    @foreach($carts as $item)
                                        <li>
                                            <strong>Image :</strong>
                                            <img src="{{ asset($item->options->image) }}" style="width:80px; 
                                            height:50px;margin-left:18px;">
                                        </li><br>
                                        <li>
                                            <strong>Product Name :
                                            <span style="color:blue">{{ $item->name }}</spn></strong>
                                        </li><br>
                                        <li>
                                            <strong>Quantity :
                                            <span style="color:blue">( {{ $item->qty}} )</span></strong>
                                            <strong style="margin-left:15px">Color :
                                            <span style="color:blue">{{ $item->options->color}}</span></strong>
                                            @if($item->options->size == NULL)
                                            
                                            @else
                                                <strong style="margin-left:15px">Size :
                                                <span style="color:blue">{{ $item->options->size}}</span></strong>
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
                                                <strong>SubTotal : <span style="color:blue">{{ $cartTotal }} SR</span></strong><hr>

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


                <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                
                                <div class="">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{asset('frontend/assets/images/payments/4.png')}}" alt="">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Card</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{asset('frontend/assets/images/payments/3.png')}}" alt="">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Cash</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img src="{{asset('frontend/assets/images/payments/2.png')}}" alt="">
                                        </div>

                                    </div><!-- end row -->
                                    <hr>

                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                        payment Step
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                    <!-- checkout-progress-sidebar -->			
                </div>

    </form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
    </div>
</div>

<!-- ============================================== BRANDS CAROUSEL ============================================== -->

@include('frontend.body.brands')

<!-- /.logo-slider --> 
<!-- ============================================== BRANDS CAROUSEL : END ========================================= -->

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change',function() {
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/"+division _id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id + '">' 
                            + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });


        $('select[name="district_id"]').on('change',function() {
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="state_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="state"]').append('<option value="'+ value.id + '">' 
                            + value.state_name + '</option>');
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