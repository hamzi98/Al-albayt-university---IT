@extends('layouts.app')

@section('content')
<title>إعادة تعيين كلمة المرور</title>

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
<h3 class="fw-bold mb-2 text-uppercase">إعادة تعيين كلمة المرور</h3>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="POST"   action="{{ route('password.email') }}" >
@csrf
<div class="form-outline form-white mb-4">
<input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="عنوان بريد الكتروني" autofocus>
@error('email')<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong></span>
@enderror
</div>

<button type="submit" class="btn btn-primary">{{ __('إرسال رابط إعادة تعيين كلمة السر') }}</button>
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
