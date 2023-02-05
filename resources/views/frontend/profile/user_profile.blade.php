@extends('frontend.main_master')
@section('content')

@section('title')
@if(session()->get('language') == 'arabic')
تحديث بيانات
@else
Update Profile Page
@endif
@endsection

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>

                <img class="card-img-top" style="border-radius:50%" src="{{ (!empty($user->profile_image))? 
                url('upload/user_images/' . $user->profile_image):url('upload/no_image.jpg') }}"
                height:="100%" width="100%" alt=""><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary ptn-sm btn-block">
                        @if(session()->get('language') == 'arabic')
                            الصفحة الرئيسية
                        @else
                            Home
                        @endif
                    </a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary ptn-sm btn-block">
                       @if(session()->get('language') == 'arabic')
                            تحديث بياناتك
                       @else
                            Profile Update
                       @endif
                    </a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary ptn-sm btn-block">
                        @if(session()->get('language') == 'arabic')
                            تغيير الباسوورد
                        @else
                            Change Password
                        @endif
                    </a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger ptn-sm btn-block">
                        @if(session()->get('language') == 'arabic')
                            خروج
                        @else
                            Logout
                        @endif
                    </a>
                </ul>

            </div>

            <div class="col-md-2">
                
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi.... </span>
                       <strong>{{ Auth::user()->name }}</strong> Update Your Profile                  
                    </h3>

                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf 

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if(session()->get('language') == 'arabic')
                                        الاسم
                                    @else
                                        Name
                                    @endif
                                <span>*</span></label>
                                <input type="text" value="{{ $user->name }}" class="form-control unicase-form-control text-input" name="name" >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if(session()->get('language') == 'arabic')
                                        الايميل
                                    @else
                                        Email Address
                                    @endif
                                <span>*</span></label>
                                <input type="email" value="{{ $user->email }}" class="form-control unicase-form-control text-input" name="email">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if(session()->get('language') == 'arabic')
                                        رقم الجوال
                                    @else
                                        Phone Number
                                    @endif
                                <span>*</span></label>
                                <input type="text" value="{{ $user->phone }}" class="form-control unicase-form-control text-input" name="phone"  >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if(session()->get('language') == 'arabic')
                                        الصورة
                                    @else
                                        Profile Image
                                    @endif    
                                <span>*</span></label>
                                <input type="file" class="form-control unicase-form-control text-input" name="profile_image"  >
                            </div><br>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                    @if(session()->get('language') == 'arabic')
                                        تحديث
                                    @else
                                        Update Profile
                                    @endif
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
                
            </div>

        </div>
    </div>
</div>




@endsection
