@extends('layouts.app')
@section('content')
<title>تعيين كلمة المرور</title>

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
<h2 class="fw-bold mb-2 text-uppercase">إعادة تعيين كلمة المرور</h2>
<p class="text-white-50 mb-5">يرجى إدخال البريد الإلكتروني وكلمة المرور!</p>
<form method="POST"  action="{{ route('password.update') }}" >
@csrf
<input type="hidden" name="token" value="{{ $token }}">

<div class="form-outline form-white mb-4">
    
    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="البريد الالكتروني" autofocus>
    @error('email')
        <span class="invalid-feedback" style="color: aliceblue" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="form-outline form-white mb-4">
    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="كلمة المرور الجديدة" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" style="color: aliceblue" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="form-outline form-white mb-4">
    <input id="password-confirm" class="form-control form-control-lg" type="password" class="form-control" name="password_confirmation" placeholder="تأكيد كلمة المرور" required autocomplete="new-password">
</div>
<button type="submit" class="btn btn-primary">{{ __('تعيين كلمة المرور') }}</button>
</form>
</div>
<div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>




@endsection
