<!doctype html>
<html dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@livewireStyles

</head>
<style>
.nav-link{color: #ffffff;margin: 5px}</style>
<body>


<div id="app">
<nav class="navbar   navbar-expand-md fixed-top top-nav" style="background-color: #343a40;color:red">
<div class="container">
<a class="navbar-brand" href="\">
<img src="{{asset('uploads/page/logo.bmp')}}" width="150 px">

</a>
<button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span  class="navbar-toggler-icon" style="">    <i class="fas fa-bars" style="color:rgb(255, 136, 136); font-size:28px;"></i>
</span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">

</ul>
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a class="nav-link" href="/"> الصفحة الرئيسية </a>
</li>
<li class="nav-item">
<a class="nav-link" href="/group/show-all"> المشاريع </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="/group/Group-Profile"> صفحة الفريق </a>
  </li>
<li class="nav-item">
<a class="nav-link" href="/student/All-Students"> الطلاب </a>
</li>
<li class="nav-item">
<a class="nav-link" href="\about"> نحن </a>
</li>
<li class="nav-item">
<a class="nav-link" href="\Contact"> تواصل معنا  </a>
</li>


@guest
<li class="nav-item">
<a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
</li>

@else
<li class="nav-item dropdown dropdown-menu-right">
<a id="navbarDropdown" style="  font-family: Georgia, serif; color: #ffffff" class="nav-link dropdown-toggle" href="#" role="button"
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
@php 
$parts = explode(" ", Auth::user()->name);
echo $parts[0]; 
@endphp
</a>
<div style="margin-right :10px;color:red" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

<a class="dropdown-item" href="/student/profile"> <i class="fas fa-user-circle"></i> الملف الشخصي  </a> 
<hr class="dropdown-divider">
<a style="color: red" class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
<i class="fas fa-sign-out-alt"></i>  تسجيل خروج
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
</div>
</li>
@endguest
</ul>
</div>
</div>
</nav>


<main class="py-4" style="margin-top: 70px">
  {{ $slot ?? ''}}  
@yield('content')

</main>
</div>

<!-- Footer -->
<footer class="bg-dark text-right text-white" >
<!-- Grid container -->
<div class="container p-4">
<section class="">
<!--Grid row-->
<div class="row">
<!--Grid column-->
<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
<h5 class="text-uppercase"> <i class="fa fa-spinner" aria-hidden="true"></i>الخدمة</h5>
<ul class="list-unstyled mb-0">
<li>
موقع للتواصل بين طلبة كلية تكنولوجيا المعلومات بخصوص مشاريع التخرج</li>
</ul>
</div>
<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
<h5 class="text-uppercase"><i class="fa fa-spinner" aria-hidden="true"></i>
التخصصات</h5>
<ul class="list-unstyled mb-0">
<li>
علم حاسوب</li>
<li>
نظم معلومات حاسوبية</li>
<li>
نظم معلومات ادارية</li>
</ul>
</div>
<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
<h5 class="text-uppercase"><i class="fa fa-spinner" aria-hidden="true"></i>
الأقسام</h5>

<ul class="list-unstyled mb-0">
<li>
<a href="/login" class="text-white"><i class="fas fa-user-graduate"></i> اعضاء </a>
</li>
<li>
<a href="/admin" class="text-white"><i class="fas fa-user-shield"></i> الادمن  </a>
</li>
</ul>
</div>


<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
<h5 class="text-uppercase"> <i class="fa fa-spinner" aria-hidden="true"></i>
روابط</h5>




<ul class="list-unstyled mb-0">
<li>
<a href="https://www.aabu.edu.jo/ar/pages/default.aspx" class="text-white"> <i class="fas fa-home"></i> جامعة ال البيت</a>
</li>
<li>
<a href="https://www.aabu.edu.jo/ar/collegesandinstitutes/it/pages/default.aspx" class="text-white"> <i class="fas fa-info-circle"></i>  كلية الأمير الحسين بن عبد الله لتكنولوجيا المعلومات</a>
</li>
<li>
<a href="https://www.mohe.gov.jo/Default/Ar" class="text-white"> <i class="fas fa-id-badge"></i> وزارة التعليم العالي</a>
</li>

</ul>
</div>
</div>
</div>
</section>

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
© 2022 Copyright: <span style="color:#ff8e8e">Hamza AL-zughbieh</span> 
</div>
</footer>
@livewireScripts

</body>
</html>
