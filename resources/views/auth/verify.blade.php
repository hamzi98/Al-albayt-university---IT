@extends('layouts.app')
@section('content')
<title>تحقق</title>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">

<div class="card-body">
@if (session('resent'))
<div class="alert alert-success" role="alert">
<p style="text-align: right;">تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني</p>
</div>
@endif





<table class="body-wrap" style="box-sizing: border-box; font-size: 16px; width: 100%; background-color: #ffffff; margin: 0;" >
<tbody>
<tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
<td style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
<td class="container" width="600" style=" box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
valign="top">
<div class="content" style=" box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
<table class="main" width="100%" cellpadding="0" cellspacing="0" style=" box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;"
>
<tbody>
<tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="" style=" box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #38414a; margin: 0; padding: 20px;"
valign="top">
<a href="#" style="font-size:32px;color:#fff;"> <img src="https://i.ibb.co/ZfmcsCD/New-Bitmap-Image-2.png" width="150 px">
</a> <br>
<span style="margin-top: 10px;display: block;">تحقق من عنوان بريدك الإلكتروني</span>
</td>
</tr>
<tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-wrap" style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
<table width="100%" cellpadding="0" cellspacing="0" style=" box-sizing: border-box; font-size: 14px; margin: 0;">
<tbody>
<tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-block" style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.
</td>
</tr>
<tr style=" box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-block" style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
إذا لم تتلق البريد الإلكتروني
</td>
</tr>
<tr style="box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-block" style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button class="btn btn-danger" style="float: right;" type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('انقر هنا لطلب آخر') }}</button>
        </form>
        
</td>
</tr>
<tr style="box-sizing: border-box; font-size: 14px; margin: 0;">
<td class="content-block" style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
    شكرا     <b>لانضمامك </b>  إلى موقعنا.
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>


@endsection

