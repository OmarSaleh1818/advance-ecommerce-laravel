@extends('frontend.main_master')
@section('content')

@section('title')
@if(session()->get('language') == 'arabic')
قائمة الكارت
@else
Your Cart Page
@endif
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	                <div class="table-responsive">
		                <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">
                                    @if(session()->get('language') == 'arabic')
                                        ازالة
                                    @else
                                        Remove
                                    @endif
                                    </th>
                                    <th class="cart-description item">
                                    @if(session()->get('language') == 'arabic')
                                        صورة 
                                    @else
                                        Image
                                    @endif
                                    </th>
                                    <th class="cart-product-name item">
                                    @if(session()->get('language') == 'arabic')
                                        اسم المنتج
                                    @else
                                        Product Name
                                    @endif
                                    </th>
                                    <th class="cart-edit item">
                                    @if(session()->get('language') == 'arabic')
                                        تعديل
                                    @else
                                        Edit
                                    @endif
                                    </th>
                                    <th class="cart-qty item">
                                    @if(session()->get('language') == 'arabic')
                                        الكمية
                                    @else
                                        Quantity
                                    @endif
                                    </th>
                                    <th class="cart-sub-total item">
                                    @if(session()->get('language') == 'arabic')
                                        المجموع
                                    @else
                                        Subtotal
                                    @endif</th>
                                    <th class="cart-total last-item">
                                    @if(session('language') == 'arabic')
                                        المجموع الكلي
                                    @else
                                        Grandtotal
                                    @endif
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
			                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
			                </tfoot>
			                <tbody id="mycart">
                           
                                
			                </tbody><!-- /tbody -->
		                </table><!-- /table -->
	                </div>
                </div><!-- /.shopping-cart-table -->	
                
                <div class="col-md-4 col-sm-12 estimate-ship-tax">

                </div>
		
                <div class="col-md-4 col-sm-12 estimate-ship-tax" id="couponFaild">
                    @if(Session::has('coupon'))

                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input"
                                             placeholder="You Coupon.." id="coupon_name">
                                        </div>
                                        @if(Cart::total() > 0)
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary" 
                                                onclick="applyCoupon()">APPLY COUPON</button>
                                            </div>
                                        @else
                                            <div class="clearfix pull-right">
                                                <a href="{{ url('/') }}" type="submit" class="btn-upper btn btn-primary" 
                                                >APPLY COUPON</a>
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    @endif
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="couponCalFaild">
                           
                        </thead><!-- /thead -->
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">
                                                PROCCED TO CHEKOUT
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->

            </div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
    </div>
</div>

<!-- ============================================== BRANDS CAROUSEL ============================================== -->

@include('frontend.body.brands')

<!-- /.logo-slider --> 
<!-- ============================================== BRANDS CAROUSEL : END ========================================= --> 

@endsection