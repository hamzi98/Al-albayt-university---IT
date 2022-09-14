@extends('layouts.AdminApp')
@section('content')
<title>المشاريع</title>
<link href="{{ asset('css/group.css') }}" rel="stylesheet">
<style>body{ text-align: right; background: url('{{asset('uploads/page/p2.JPG')}}') center center no-repeat; background-size: cover; background-position: 30%; background-attachment: fixed; color: #000000;-webkit-font-smoothing: antialiased;}
</style>


@if ($info->isEmpty()) 
<div class="d-flex justify-content-center align-items-center" style="margin-top: 200px;  margin-bottom: 200px;">
<div class="inline-block align-middle">
<h2 class="font-weight-normal lead" style="color: bisque">لايوجد محتوى حالياً</h2>
</div>
<h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center" style="color: bisque">404</h1>
</div> 
@endif

<section class="details-card">
<div class="container">
<div class="row">
@foreach ($info as $item)
<div class="col-md-4">
<div class="card-content">
<div class="card-img">
<img src="https://i.ibb.co/zs51h7g/1.png"  style="width: 150px;display: block; margin-left: auto; margin-right: auto;"  alt="">
<span style="padding-left: 100px">
@php
$count="0";
if ($item->FrontEnd=='مطلوب')
$count="1";
if($item->BackEnd=='مطلوب')
$count=$count+"1";
if($item->Documentation=='مطلوب')
$count=$count+"1";
if($item->DataBase=='مطلوب')
$count=$count+"1";
if($count ==0)
echo "<h4 style= 'background-color:red;font-size: 15px'>الفريق مكتمل</h4> ";
else
echo "<h4  style= 'font-size: 15px' >متبقي لاكتمال الفريق  : ".$count. "</h4>";
@endphp
</span>
</div>
<div class="card-desc">
<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 3px #1ABC9C;margin-bottom:50px">

<h6> عنوان المشروع : <span style="color:#296a5e"> {{$item->title}}</span></h6> 
<h6> نوع المشروع : <span style="color:#296a5e"> {{$item->type}}</span></h6> 
<h6> لغة المشروع  :  <span style="color:#296a5e"> {{$item->lang}}</span></h6> 
<h6> القسم :  <span style="color:#296a5e"> {{$item->Project_Admin->dep}}</span></h6> 
<h6> مشرف المشروع :  <span style="color:#296a5e"> د.@php $value = \App\Models\Dr::where('id',$item->dr)->first();echo $value->name;@endphp</span></h6> 
<h6> منشئ المجموعة :  <span style="color:#296a5e">{{$item->Project_Admin->name}}</span></h6> 
<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 2px #000000;margin-bottom:50px">
<h6> المشكلة التي يحاول حلها المشروع  :  </h6>
<ol style="font-size: 14px;color:#296a5e">{{$item->des}}</ol>
<h6> الجهة المستفيدة من المشروع إن وجدت :   </h6> 
<ul style="font-size: 14px;color:#296a5e">
<li > @if (empty($item->forr))
لايوجد
@else 
{{$item->forr}}
@endif 
</li> 
</ul>
<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 2px #000000;margin-bottom:50px">

<h6> الشواغر للفريق :  </h6> 
<ol style="font-size: 14px;color:#296a5e">
<li style="margin: 5px" >BackEnd : @if($item->BackEnd =='مطلوب') <span style="color: red"> {{$item->BackEnd}}  <a ><button type="button" class="btn btn-success" style="font-size: 15px " >انضمام</button></a></span> @else {{$item->BackEnd}} @endif</li> 
<li style="margin: 5px">FrontEnd : @if($item->FrontEnd =='مطلوب')      <span style="color: red">{{$item->FrontEnd}} <a ><button type="button" class="btn btn-success" style="font-size: 15px ">انضمام</button></a> </span> @else{{$item->FrontEnd}}  @endif </li> 
<li style="margin: 5px">Documentation : @if($item->Documentation =='مطلوب')  <span style="color: red">{{$item->Documentation}} <a ><button type="button" class="btn btn-success" style="font-size: 15px">انضمام</button></a></span> @else{{$item->Documentation}}  @endif </li>
<li style="margin: 5px"> DataBase : @if($item->DataBase =='مطلوب')     <span style="color: red">{{$item->DataBase}} <a ><button type="button" class="btn btn-success" style="font-size: 15px">انضمام</button></a> </span> @else{{$item->DataBase}} @endif </li>
</ol>
<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 3px #1ABC9C;margin-bottom:50px">
<p class="btn-card" style="color: beige; text-align:center;font-size: 20px;">تنويه الأنضمام الى الفريق  يتم من خلال اختيار وظيفه واحده فقط</p>   
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>  
</div>
</section>
@endsection