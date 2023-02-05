@extends('frontend.main_master')
@section('content')

@section('title')
@if(session()->get('language') == 'arabic')
حسابك
@else
Profile Page
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
                    <h3 class="text-center" style="margin-top:150px"><span class="text-danger">
                        @if(session()->get('language') == 'arabic')
                            اهلا و سهلا بك في منتجاتنا <strong>{{ Auth::user()->name }}</strong> 
                         مرحبا</span>
                        @else
                            Hi.... </span>
                            <strong>{{ Auth::user()->name }}</strong> Welcome To Omar Online Shop 
                        @endif      
                    </h3>
                </div>
                
            </div>

        </div>
    </div>
</div>




@endsection
