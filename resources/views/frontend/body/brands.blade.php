<div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

        @php 

        $brands = App\Models\Brand::latest()->get();

        @endphp

        @foreach($brands as $brand)
          <div class="item m-t-5"> <a href="#" class="image"> 
            <img src="{{ asset($brand->brand_image) }}" alt=""> </a> 
          </div>
          <!--/.item-->
        @endforeach
        </div>

        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>