@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<!-- Main content -->
<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Edit Product</h4>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $products->id }}">

             <div class="row">
               <div class="col-12">	
               
                    <div class="row"> <!-- Row 1 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="brand_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{$brand->id == $products->brand_id ? 'selected' : '' }}>
                                            {{ $brand->brand_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{$category->id == $products->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> 

                    </div><!-- End Row 1 -->

                    <div class="row"> <!-- Row 2 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select SubCategory</option>
                                        @foreach($subcategory as $sub)
                                        <option value="{{ $sub->id }}" {{$sub->id == $products->subcategory_id ? 'selected' : '' }}>
                                            {{ $sub->subcategory_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subsubcategory_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select SubSubCategory</option>
                                        @foreach($subsubcategory as $subsub)
                                        <option value="{{ $subsub->id }}" {{$subsub->id == $products->subsubcategory_id ? 'selected' : '' }}>
                                            {{ $subsub->subsubcategory_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('subsubcategory_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row 2 -->

                    <div class="row"> <!-- Row 6 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_en }}"> 
                                    @error('product_name_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Name Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_ar" class="form-control" value="{{ $products->product_name_ar }}"> 
                                    @error('product_name_ar')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}">  
                                    @error('product_qty')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}"> 
                                    @error('selling_price')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- End Row 6 --> 

                    <div class="row"> <!-- Row 3 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}"> 
                                    @error('discount_price')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Code <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}"> 
                                    @error('product_code')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row 3 -->    
                    
                    <div class="row"> <!-- Row 4 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Tags English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_en" class="form-control" 
                                    data-role="tagsinput" value="{{ $products->product_tags_en }}"> 
                                    @error('product_tags_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Tags Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_ar" class="form-control"
                                     data-role="tagsinput" value="{{ $products->product_tags_ar }}"> 
                                    @error('product_tags_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row 4 --> 

                    <div class="row"> <!-- Row 5 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Size English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_en" class="form-control" 
                                    value="small,Mudium,Large"data-role="tagsinput" value="{{ $products->product_size_en }}"> 
                                    @error('product_size_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Size Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_ar" class="form-control" 
                                    value="صغير,وسط,كبير"data-role="tagsinput" value="{{ $products->product_size_ar }}"> 
                                    @error('product_size_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Color English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_en" class="form-control"
                                    value="red,blue,green" data-role="tagsinput" value="{{ $products->product_color_en }}"> 
                                    @error('product_color_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Color Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_ar" class="form-control" 
                                    value="ازرق,احمر,اصفر"data-role="tagsinput" value="{{ $products->product_color_ar }}"> 
                                    @error('product_color_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row 5 --> 

                    <div class="row"> <!-- Row 7 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea name="short_description_en" id="textarea" class="form-control" 
                                 placeholder="Textarea text">{!! $products->short_description_en !!}"</textarea>
                                    @error('short_description_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea name="short_description_ar" id="textarea" class="form-control" 
                                 placeholder="Textarea text">{!! $products->short_description_ar !!}"</textarea>
                                    @error('short_description_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- End Row 7 --> 
            
                    <div class="row"> <!-- Row 8 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea id="editor1" name="long_description_en" rows="10" cols="80" style="visibility: 
                                hidden; display: none;">{!! $products->long_description_en !!}"												
						        </textarea>
                                    @error('long_description_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea id="editor2" name="long_description_ar" rows="10" cols="80" style="visibility: 
                                hidden; display: none;">{!! $products->long_description_ar !!}"												
						        </textarea>
                                    @error('long_description_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- End Row 8 --> 

                    <hr>

               </div>
             </div>
               <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                           <div class="controls">
                               <fieldset>
                                   <input type="checkbox" id="checkbox_2" name="featured" value="1"
                                    {{ $products->featured == 1 ? 'checked' : ''}}>
                                   <label for="checkbox_2">Featured Product</label>
                               </fieldset>
                           </div>
                       </div>
                   </div>
                    <div class="col-md-4">
                       <div class="form-group">
                           <div class="controls">
                               <fieldset>
                                   <input type="checkbox" id="checkbox_3" name="special_offers" value="1"
                                   {{ $products->special_offers == 1 ? 'checked' : ''}}>
                                   <label for="checkbox_3">Special Offers</label>
                               </fieldset>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <div class="controls">
                               <fieldset>
                                   <input type="checkbox" id="checkbox_4" name="special_deals" value="1"
                                   {{ $products->special_deals == 1 ? 'checked' : ''}}>
                                   <label for="checkbox_4">Special Deals</label>
                               </fieldset>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="text-xs-right">
               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Product">
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

<section class="content">
 	<div class="row">

        <div class="col-md-12">
            <div class="box bt-3 border-info">
                <div class="box-header">
                    <h4 class="box-title"> Main Image <strong>Update</strong></h4>
                </div>


		    <form method="post" action="{{ route('update.product.mainimage') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $products->id }}">
                <input type="hidden" name="old_image" value="{{ $products->product_thambnail }}">
                <div class="row row-sm">
                    <div class="col-md-3">

                        <div class="card">
                            <img src="{{ asset($products->product_thambnail) }}" class="card-img-top" style="height: 150px; width: 280px;">
                            <div class="card-body">
                                <p class="card-text"> 
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                        <input type="file" name="product_thambnail" class="form-control" onChange="mainImageUrl(this)"> 
                                        <img src="" id="mainImage">
                                    </div> 
                                </p>

                            </div>
                        </div> 		

                    </div><!--  end col md 3		 -->	

                </div>			

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Image" style="margin-left:20px">
                </div>
                <br><br>

            </form>		   
        </div>
    </div>

 	</div> <!-- // end row  -->

 </section>

<section class="content">
 	<div class="row">

        <div class="col-md-12">
            <div class="box bt-3 border-info">
                <div class="box-header">
                    <h4 class="box-title"> Multiple Image <strong>Update</strong></h4>
                </div>


		    <form method="post" action="{{ route('update.product.image') }}" enctype="multipart/form-data">
                @csrf

                <div class="row row-sm">
                    @foreach($multiImage as $img)
                    <div class="col-md-3">

                        <div class="card">
                            <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 150px; width: 280px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                <a href="{{ route('multiimage.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                </h5>
                                <p class="card-text"> 
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="multi_img[ {{$img->id}} ]">
                                    </div> 
                                </p>

                            </div>
                        </div> 		

                    </div><!--  end col md 3		 -->	
                    @endforeach

                </div>			

                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Image" style="margin-left:20px">
                </div>
                <br><br>

            </form>		   
        </div>
    </div>



 	</div> <!-- // end row  -->

 </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change',function() {
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


            $('select[name="subcategory_id"]').on('change',function() {
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id + '">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>


<script type="text/javascript">
    function mainImageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainImage').attr('src' ,e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

@endsection