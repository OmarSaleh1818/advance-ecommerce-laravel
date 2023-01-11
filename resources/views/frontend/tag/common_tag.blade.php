<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>

    @php
    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
    @endphp
    <nav class="yamm megamenu-horizontal">
    @foreach($categories as $category)
    <ul class="nav">
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
        data-toggle="dropdown"><i class="{{ $category->category_icon }} " aria-hidden="true"></i>
            @if(session()->get('language') == 'arabic') 
            {{ $category->category_name_ar }}
            @else
            {{ $category->category_name_en }}
            @endif</a>
        <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
            <div class="row">
                @php
                    $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                @endphp
                @foreach($subcategories as $subcategory)
                <div class="col-sm-12 col-md-3">

                <a href="{{ url('subcategory/product/'.$subcategory->id) }}">
                    <h2 class="title">
                    @if(session()->get('language') == 'arabic') 
                    {{ $subcategory->subcategory_name_ar }}
                    @else
                    {{ $subcategory->subcategory_name_en }}
                    @endif
                    </h2>
                </a>

                @php 
                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)
                ->orderBy('subsubcategory_name_en', 'ASC')->get();
                @endphp
                @foreach($subsubcategories as $subsubcategory)
                <ul class="links list-unstyled">
                    <li><a href="#">
                    @if(session()->get('language') == 'arabic') 
                    {{ $subsubcategory->subsubcategory_name_ar }}
                    @else
                    {{ $subsubcategory->subsubcategory_name_en }}
                    @endif
                    </a></li>
                </ul>
                @endforeach
                </div>
                @endforeach
                <!-- /.col -->
            </div>
            <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
        </ul>
        @endforeach
        <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
    </ul>
    <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
</div>