<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Home\LanguageController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ------------- Admin Route --------------- */


Route::prefix('admin')->group(function() {

    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');

Route::middleware(['auth:admin'])->group(function(){

    Route::get('/dashboard',[AdminController::class, 'Dashboard'])
    ->name('admin.dashboard')->middleware('auth:admin');

    Route::get('/logout',[AdminController::class, 'AdminLogout'])
    ->name('admin.logout')->middleware('admin');

    Route::get('/register/owner',[AdminController::class, 'AdminRegister'])->name('admin.register');

    Route::post('/register/create',[AdminController::class, 'RegisterCreate'])->name('admin.register.create');

    Route::get('/profile',[AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

    Route::get('/profile/edit',[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    Route::post('/profile/store',[AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/change/password',[AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/update/password',[AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');

});
});
// Admin Brand All Route 
Route::middleware(['auth:admin'])->group(function(){
Route::prefix('brand')->group(function() {

    Route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete');

});
});

// End Admin Brand Route 


// Admin Category All Route
Route::middleware(['auth:admin'])->group(function(){
Route::prefix('category')->group(function() {

    Route::get('/view',[CategoryController::class, 'CategoryView'])->name('all.category')->middleware('auth:admin');
    Route::post('/store',[CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('category.delete');

// Admin SubCategory All Route

    Route::get('/sub/view',[SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store',[SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

// Admin Sub_SubCategory All Route

    Route::get('/sub/sub/view',[SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::post('/sub/sub/store',[SubSubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}',[SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update',[SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}',[SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

    Route::get('/subcategory/ajax/{category_id}',[SubSubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubSubCategoryController::class, 'GetSubSubCategory']);

});
});

// Admin Product All Route
Route::middleware(['auth:admin'])->group(function(){
Route::prefix('product')->group(function() {

    Route::get('/add',[ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store',[ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('/manage',[ProductController::class, 'ManageProduct'])->name('manage.product');
    Route::get('/edit/{id}',[ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/data/update',[ProductController::class, 'ProductUpdate'])->name('product.update');
    Route::post('/image/update',[ProductController::class, 'MultiImageUpdate'])->name('update.product.image');
    Route::post('/mainimage/update',[ProductController::class, 'MainImageUpdate'])->name('update.product.mainimage');
    Route::get('/multiimage/delete/{id}',[ProductController::class, 'MultiImageDelete'])->name('multiimage.delete');
    Route::get('/inactive/{id}',[ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}',[ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}',[ProductController::class, 'ProductDelete'])->name('product.delete');


});
});

// End Admin Product All Route

// Admin Slider All Route
Route::middleware(['auth:admin'])->group(function(){
Route::prefix('slider')->group(function() {

    Route::get('/manage',[SliderController::class, 'ManageSlider'])->name('manage.slider');
    Route::post('/store',[SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}',[SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update',[SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}',[SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}',[SliderController::class, 'SliderActive'])->name('slider.active');

});
});

// End Admin Slider All Route

// Admin Coupon All Route
Route::middleware(['auth:admin'])->group(function(){
    Route::prefix('coupons')->group(function() {
    
        Route::get('/manage',[CouponController::class, 'ManageCoupon'])->name('manage.coupon');
        Route::post('/store',[CouponController::class, 'CouponStore'])->name('coupon.store');
        Route::get('/edit/{id}',[CouponController::class, 'CouponEdit'])->name('coupon.edit');
        Route::post('/update',[CouponController::class, 'CouponUpdate'])->name('coupon.update');
        Route::get('/delete/{id}',[CouponController::class, 'CouponDelete'])->name('coupon.delete');
    
    });
});

// Admin Shipping All Route
Route::middleware(['auth:admin'])->group(function(){
    Route::prefix('shipping')->group(function() {
    
        Route::get('/manage/division',[ShippingController::class, 'ManageDivision'])->name('manage.division');
        Route::post('/store/division',[ShippingController::class, 'DivisionStore'])->name('division.store');
        Route::get('/edit/division/{id}',[ShippingController::class, 'DivisionEdit'])->name('division.edit');
        Route::post('/update/division',[ShippingController::class, 'DivisionUpdate'])->name('division.update');
        Route::get('/delete/division/{id}',[ShippingController::class, 'DivisionDelete'])->name('division.delete');

        Route::get('/manage/district',[ShippingController::class, 'ManageDistrict'])->name('manage.district');
        Route::post('/store/district',[ShippingController::class, 'DistrictStore'])->name('district.store');
        Route::get('/edit/district/{id}',[ShippingController::class, 'DistrictEdit'])->name('district.edit');
        Route::post('/update/district',[ShippingController::class, 'DistrictUpdate'])->name('district.update');
        Route::get('/delete/district/{id}',[ShippingController::class, 'DistrictDelete'])->name('district.delete');

        Route::get('/manage/state',[ShippingController::class, 'ManageState'])->name('manage.state');
        Route::post('/store/state',[ShippingController::class, 'StateStore'])->name('state.store');
        Route::get('/edit/state/{id}',[ShippingController::class, 'StateEdit'])->name('state.edit');
        Route::post('/update/state',[ShippingController::class, 'StateUpdate'])->name('state.update');
        Route::get('/delete/state/{id}',[ShippingController::class, 'StateDelete'])->name('state.delete');
        Route::get('/division/district/ajax/{division_id}',[ShippingController::class, 'GetDivision']);
    
    });
});
    
    // End Admin Slider All Route



/* ------------- End Admin Route -------------*/



/* ------------- All User Route -------------*/

//  Start Index Route
Route::controller(IndexController::class)->group(function() {
    
    Route::get('/','Index');
    Route::get('/user/logout', 'UserLogout')->name('user.logout');
    Route::get('/user/profile', 'UserProfile')->name('user.profile');
    Route::post('/user/profile/store', 'UserProfileStore')->name('user.profile.store');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/user/password/update', 'UserPasswordUpdate')->name('user.password.update');

    Route::get('/product/details/{id}/{slug}', 'ProductDetails');

    Route::get('/product/tag/{tag}', 'TagsProduct');
    Route::get('/subcategory/product/{subcat_id}', 'SubCatProduct');
    Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', 'SubSubCatProduct');

    Route::get('/product/model/view/{id}', 'ProductViewAjax');

});

// End Index Route

//  Start Cart Route

Route::controller(CartController::class)->group(function() {

    Route::post('/cart/data/store/{id}', 'AddToCart');
    Route::get('/product/mini/cart', 'AddMiniCart');
    Route::get('/minicart/product/remove/{rowId}', 'RemoveMiniCart');

});

Route::middleware('auth')->group(function () {
    Route::controller(CartPageController::class)->group(function() {

        Route::get('/mycart', 'MyCartPage');
        Route::get('/mycart/product', 'MyCartProduct');

    });
});

// End Cart Route


//  Start Wishlist Route

Route::post('/add-to/wishlist/{product_id}',[WishlistController::class, 'AddToWishlist']);

Route::middleware('auth')->group(function () {
    Route::controller(WishlistController::class)->group(function() {
     
        Route::get('/wishlist', 'WishlistPage')->name('wishlist');
        Route::get('/get/wishlist/product', 'GetWishlistProduct');
        Route::get('/wishlist/product/remove/{id}', 'RemoveWishlist');
    
    });
});

// End Wishlist Route

/////// Multi Language All Route /////////

Route::get('/language/english',[LanguageController::class, 'English'])->name('english.language');
Route::get('/language/arabic',[LanguageController::class, 'Arabic'])->name('arabic.language');

/////// End Multi Language All Route /////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
