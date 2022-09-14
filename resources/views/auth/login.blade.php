@extends('layouts.app')
@section('content')
<title>تسجيل الدخول</title>

<style>
    .invalid-feedback{color: antiquewhite;}
    body{
        direction: rtl;
    text-align: right;
    background: url('{{asset('uploads/page/alluser.JPEG')}}') center center no-repeat;

    background-size: cover;
    background-position: 30%;
    background-attachment: fixed;
    color: #000000;
    -webkit-font-smoothing: antialiased;
    }
</style>




<!-- Remind Passowrd -->
<div id="formFooter">
</div>
</div>
</div>
<section class="vh-100 gradient-custom" >
<div class="container py-5 h-100" >
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-12 col-md-8 col-lg-6 col-xl-5" >
<div class="card bg-dark text-white" style="border-radius: 1rem;" >
<div class="card-body p-5 text-center" style="background-color: #2a3e44">
<div class="mb-md-5 mt-md-4 pb-5">
<h2 class="fw-bold mb-2 text-uppercase">تسجيل الدخول</h2>
<p class="text-white-50 mb-5">يرجى إدخال البريد الإلكتروني وكلمة المرور!</p>
<form method="POST"  action="{{ route('login') }}" >
@csrf
<div class="form-outline form-white mb-4">
<input id="email" type="text"class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
placeholder="البريد الالكتروني">
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="form-outline form-white mb-4">
<input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
required autocomplete="current-password" placeholder="كلمة المرور">
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror      
</div>
<p class="small mb-5 pb-lg-2">
@if (Route::has('password.request'))
<a class="btn btn-link" style="color: rgb(255, 255, 255)"  href="{{ route('password.request') }}">{{ __('نسيت كلمة المرور؟') }}</a> 
@endif
</p>
<button class="btn btn-outline-light btn-lg px-5" type="submit">دخول</button>
</form>
</div>
<p><a class="btn btn-link" style="color: rgb(255, 255, 255)"  href="/admin/login">{{ __('الدخول بصفة أدمن') }} <i class="fas fa-external-link-alt"></i></a> </p>

<div>
<p class="mb-0">ليس لديك حساب؟ <a class="underlineHover" style="color: rgb(238, 138, 138)" href="{{ route('register') }}">انشاء حساب</a>
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection
