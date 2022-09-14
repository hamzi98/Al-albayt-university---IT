@extends('layouts.app')
@section('content')
<title>إنشاء حساب</title>
<style>
    body{background-color: #343a40}
</style>
<section class="vh-100" style="direction: rtl; text-align: right; background: url('{{asset('uploads/page/alluser.JPEG')}}') center center no-repeat; background-size: cover; background-position: 30%; background-attachment: fixed; color: #000000; -webkit-font-smoothing: antialiased;">
<div class="container h-100">
<div class="row d-flex justify-content-center align-items-center h-100">
<div class="col-lg-12 col-xl-11">
<div class="card text-black" style="border-radius: 25px;">
<div class="card-body p-md-5">
<div class="row justify-content-center">
<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">إنشاء حساب</p>

<form class="mx-1 mx-md-4" method="POST" action="">
        @csrf
<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-user fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="name" type="text" placeholder="أدخل الاسم الاول" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"   autofocus>

@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-user fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="l_name" type="text" placeholder="أدخل الاسم الاخير" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}"   autofocus>

@error('l_name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="d-flex flex-row align-items-center mb-4">
    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="id_uni" type="text" placeholder="أدخل الرقم الجامعي" class="form-control @error('id_uni') is-invalid @enderror"  value="{{ old('id_uni') }}" name="id_uni" >

@error('id_uni')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="email" type="text" placeholder="أدخل البريد الإلكتروني"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  >

@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-lock fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="password"  placeholder="أدخل كلمة المرور"  type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="كلمة المرور">

@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-key fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="password-confirm"   placeholder="أدخل  تأكيد كلمة المرور"  type="password" class="form-control" name="password_confirmation"  autocomplete="تأكيد كلمة المرور ">

</div>
</div>

<div class="form-check d-flex justify-content-center mb-5">

<label class="form-check-label" for="form2Example3">
 <a href="/login">لديك حساب! |تسجيل الدخول</a>
</label>
</div>

<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
    <button type="submit" class="btn btn-primary signup">
        {{ __('تسجيل') }}
    </button></div>

</form>

</div>
<div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>





@endsection
