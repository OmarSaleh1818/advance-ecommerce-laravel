@extends('admin.admin_master')
@section('admin')

<!-- Main content -->
<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Add Product</h4>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form novalidate>
             <div class="row">
               <div class="col-12">	
               
                    <div class="row"> <!-- Row 1 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="brand_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select Brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> 

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select SubCategory</option>
                                       
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><!-- End Row 1 -->

                    <div class="row"> <!-- Row 2 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subsubcategory_id" class="form-control" >
                                        <option value="" selected="" disabled="">Select SubSubCategory</option>
                                        
                                    </select>
                                    @error('subsubcategory_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_en" class="form-control"> 
                                    @error('product_name_en')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_ar" class="form-control"> 
                                    @error('product_name_ar')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row 2 -->

                    <div class="row"> <!-- Row 3 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Code <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control"> 
                                    @error('product_code')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control"> 
                                    @error('product_qty')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="selling_price" class="form-control"> 
                                    @error('selling_price')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row 3 -->    
                    
                    <div class="row"> <!-- Row 4 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_en" class="form-control" 
                                    value="Lorem,Ipsum,Amet"data-role="tagsinput" > 
                                    @error('product_tags_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_ar" class="form-control"
                                    value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                    @error('product_tags_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_en" class="form-control" 
                                    value="small,Mudium,Large"data-role="tagsinput"> 
                                    @error('product_size_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div> <!-- End Row 4 --> 

                    <div class="row"> <!-- Row 5 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_ar" class="form-control" 
                                    value="صغير,وسط,كبير"data-role="tagsinput"> 
                                    @error('product_size_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <h5>Product Color English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_en" class="form-control"
                                    value="red,blue,green" data-role="tagsinput"> 
                                    @error('product_color_en')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Color Arabic <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_ar" class="form-control" 
                                    value="ازرق,احمر,اصفر"data-role="tagsinput"> 
                                    @error('product_color_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row 5 --> 

                    <div class="row"> <!-- Row 6 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="discount_price" class="form-control"> 
                                    @error('discount_price')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Main Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="product_thambnail" class="form-control"> 
                                    @error('product_thambnail')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Multi Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="multi_image[]" class="form-control"> 
                                    @error('multi_image')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row 6 --> 

                    <div class="row"> <!-- Row 7 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea name="short_description_en" id="textarea" class="form-control" 
                                required placeholder="Textarea text"></textarea>
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
                                required placeholder="Textarea text"></textarea>
                                    @error('short_description_ar')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- End Row 7 --> 
            
                   <div class="form-group">
                       <h5>Textarea <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                       </div>
                   </div>
               </div>
             </div>
               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group">
                           <h5>Checkbox <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="checkbox" id="checkbox_1" required value="single">
                               <label for="checkbox_1">Check this custom checkbox</label>
                           </div>								
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <h5>Checkbox Group <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <fieldset>
                                   <input type="checkbox" id="checkbox_2" required value="x">
                                   <label for="checkbox_2">I am unchecked Checkbox</label>
                               </fieldset>
                               <fieldset>
                                   <input type="checkbox" id="checkbox_3" value="y">
                                   <label for="checkbox_3">I am unchecked too</label>
                               </fieldset>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="text-xs-right">
               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Product">
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


@endsection