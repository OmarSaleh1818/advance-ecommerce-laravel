@extends('frontend.main_master')
@section('content')

@section('title')
@if(session()->get('language') == 'arabic')
تغيير الباسوورد
@else
Change Password Page
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
                            تحديث البيانات
                        @else
                            Profile Update
                        @endif
                    </a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary ptn-sm btn-block">
                        @if(session()->get('language') == 'arabic')
                            تغيير البسوورد
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
                    <h3 class="text-center"><span class="text-danger">
                        @if(session()->get('language') == 'arabic')
                            تغيير الباسوورد
                        @else
                            Change Password
                        @endif
                    </span>

                    </h3><br>

                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="post">
                            @csrf 

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if(session()->get('language') == 'arabic')
                                        الباسوورد الحالي
                                    @else
                                        Current Password
                                    @endif
                                    <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="current_password" name="oldpassword" >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if(session()->get('language') == 'arabic')
                                        الباسوورد الجديد
                                    @else
                                        New Password
                                    @endif
                                <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" 
                                name="newpassword" id="password">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if(session()->get('language') == 'arabic')
                                        تاكيد الباسوورد
                                    @else
                                        Confirm Password
                                    @endif
                                <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" 
                                name="password_confirmation" id="password_confirmation" >
                            </div><br>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                    @if(session()->get('language') == 'arabic')
                                        حدث الباسوورد
                                    @else
                                        Update Password
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
