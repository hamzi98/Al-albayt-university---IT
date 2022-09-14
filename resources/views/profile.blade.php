@extends('layouts.app')
@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<title>صفحتي</title>
<style>      
.row{margin-right: 1px;margin-left: 1px}
label{padding-right: 10px;}
input, select{margin-top: 10px;font-family:adobe arabic;}
.t{color: brown;font-family:adobe arabic;padding-right: 10px;}
body {background-color: #fdfeff}
</style>

<body>
<div class="container main-secction">
<div class="row">
<div class="row user-left-part">
<div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
<div class="row ">
<div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
<div id="overlay">
<div class="rounded-circle" style="background: url('{{asset('uploads/profile/'.Auth::user()->image)}}') center center no-repeat;  text-align: center;width: 150px;height: 150px;background-size: cover;margin: auto;margin-top: 20px;margin-bottom: 30px; ">

<form id="update" class="topBefore" method="" enctype="multipart/form-data" action="" >
@csrf
<input class="in" id="photo"  name="photo" type="file" style="margin: 80px 0 0 0;visibility:hidden ">
<label for="photo" class="btn" style="margin-top: 29px;padding: 2px;background-color: #343a40; color:white">تغيير الصورة</label>
<div class="trick">
</div>
</div></div>
<span class="text-danger error-text photo_err" style="background-color:rgb(255, 230, 230)"></span>
</form>

<p style="font-size: 18px;color:#343a40;  font-weight: bold;">
@php
$name= explode(' ',Auth::user()->name);
$final_name = explode(" ", Auth::user()->l_name );
echo $name[0]."  ".end($final_name) ;
@endphp
</p>
<hr>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
<button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-primary btn-block ">تعديل المعلومات </button>
<br> 
@if (Auth::User()->accept==3 or Auth::User()->accept==2 ) <a style="text-decoration: none;" href="/group/Group-Profile"><button class="btn btn-secondary btn-block">صفحة الفريق </button> </a>
@elseif(Auth::User()->accept==1) <p>في حال قبول طلبك سوف تظهر صفحة الفريق هنا  </p> 
@else
<a style="text-decoration: none;" href="/group/create"><button class="btn btn-secondary btn-block">انشاء فريق!   </button> </a>
@endif
</div>
</div>
</div>
<div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
<div class="row profile-right-section-row">
<div class="col-md-12">
<div class="row">
<div class="col-md-8">
<ul class="nav nav-tabs" role="tablist" style="margin-top: 20px">
<li class="nav-item">
<a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> معلومات الملف الشخصي</a>
</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade show active" id="profile">
<br>
<div class="row">
<label>الاسم الاول</label>
<p class="t">{{Auth::user()->name}}</p>
</div>
<hr>
<div class="row">
<label>الاسم الاخير</label>
<p class="t">{{Auth::user()->l_name}}</p>
</div>
<hr>
<div class="row">
<label> البريد الإلكتروني </label>
<p class="t">{{Auth::user()->email}} <i style="color: green" class="fas fa-badge-check"></i></p>
@if (!empty(Auth::user()->getPendingEmail()) )
<p class="t"><br>{{Auth::user()->getPendingEmail()}} <i  style="color: red" class="fas fa-exclamation-circle"></i>
<a href="/resends-email"><button  style="margin-right: 5px;" id="SendMessage" type="button" class="btn btn-primary ">تاكيد</button></a> 
<a href="/delete-new-email"><button  style="margin-right: 5px;" id="SendMessage" type="button" class="btn btn-primary ">ازاله</button></a> </p>
@endif
</div>
<hr>

<div class="row">
<label>الرقم الجامعي</label>
<p class="t">{{Auth::user()->id_uni}}</p>
</div>
<hr>
<div class="row">
<label>التخصص</label>
<p class="t">{{Auth::user()->dep}}</p>
</div>
<hr>
<div class="row">
<label>رقم الهاتف</label>
<p class="t">{{Auth::user()->phone}}</p>
</div>
<hr>
<div class="row">
<label>
المهارات
</label>

<p class="t">

@foreach ($skills as $item)
<button type="button" style="margin: 5px" class="btn btn-primary">{{$item->skills->name}}</button>
@endforeach

<br></p>
</div>

</div>

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="contact">تعديل الملف الشخصي</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="form-group">


<form id="edite-profile" method="post" action=""  >
@csrf
<input id="name" name="name"  type="text" placeholder="تحديث الاسم الاول" class="form-control" value="{{Auth::user()->name}}"    >
<span class="text-danger error-text name_err"></span>
<input id="l_name" name="l_name" type="text" placeholder="تحديث الاسم الاخير" class="form-control" value="{{Auth::user()->l_name}}"  >
<span class="text-danger error-text l_name_err"></span>
<input id="email" name="email" type="email" placeholder="تحديث البريد الالكتروني" class="form-control" value="{{Auth::user()->email}}"  >
<span class="text-danger error-text email_err"></span>
<select  name="dep" id="dep" class="form-control">
<option name="dep" id="dep" value="" disabled  >تخصص الطاالب  </option>
<option name="dep"  @if(Auth::user()->dep=='CS') selected @endif id="dep"  value="CS" >CS</option>
<option name="dep"  @if(Auth::user()->dep=='CIS') selected @endif id="dep" value="CIS">CIS</option>
<option name="dep" @if(Auth::user()->dep=='MIS') selected @endif  id="dep" value="MIS">MIS</option>
</select>
<span class="text-danger error-text dep_err"></span>
<input type="text" class="form-control" autocomplete="off" name="phone"value="{{Auth::user()->phone}}" id="phone" placeholder="تحديث رقم الهاتف" >
<span class="text-danger error-text phone_err"></span>
<div class="text-center">
<p class="col-md-12" >المهارات</p><br>
<label class="btn btn-primary"><input type="checkbox" name="skills[]" value="1" @foreach ($skills as $w) @if($w->skills->id=="1") checked else @endif @endforeach>++C </label>
<label class="btn btn-primary" ><input type="checkbox" name="skills[]" value="8"@foreach ($skills as $w) @if($w->skills->id=="8") checked else @endif @endforeach> HTML</label>
<label class="btn btn-primary"><input type="checkbox" name="skills[]" value="9" @foreach ($skills as $w) @if($w->skills->id=="9") checked else @endif @endforeach > PHP</label>
<label class="btn btn-primary"><input type="checkbox"  name="skills[]" value="10"@foreach ($skills as $w) @if($w->skills->id=="10") checked else @endif @endforeach> JAVA</label>
</div>
<div class="text-center">
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="2"@foreach ($skills as $w) @if($w->skills->id=="2") checked else @endif @endforeach> PYTHON</label>
<label class="btn btn-primary  "><input type="checkbox"name="skills[]" value="3" @foreach ($skills as $w) @if($w->skills->id=="3") checked else @endif @endforeach>CSS</label>
<label class="btn btn-primary" ><input type="checkbox"name="skills[]" value="4"@foreach ($skills as $w) @if($w->skills->id=="4") checked else @endif @endforeach> JS</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="17"@foreach ($skills as $w) @if($w->skills->id=="17") checked else @endif @endforeach> SQL</label>
</div>
<div class="text-center">
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="18"@foreach ($skills as $w) @if($w->skills->id=="18") checked else @endif @endforeach> AJAX</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="5"@foreach ($skills as $w) @if($w->skills->id=="5") checked else @endif @endforeach> OOP</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="6"@foreach ($skills as $w) @if($w->skills->id=="6") checked else @endif @endforeach> laravel</label>
</div>
<div class="text-center">
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="19"@foreach ($skills as $w) @if($w->skills->id=="19") checked else @endif @endforeach> Flutter</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="12"@foreach ($skills as $w) @if($w->skills->id=="12") checked else @endif @endforeach> Dart</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="13"@foreach ($skills as $w) @if($w->skills->id=="13") checked else @endif @endforeach> Swift</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="14"@foreach ($skills as $w) @if($w->skills->id=="14") checked else @endif @endforeach> Kotlin</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="15"@foreach ($skills as $w) @if($w->skills->id=="15") checked else @endif @endforeach> Angular</label>
</div>
<div class="text-center">
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="16"@foreach ($skills as $w) @if($w->skills->id=="16") checked else @endif @endforeach> Data-Analysis</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="11"@foreach ($skills as $w) @if($w->skills->id=="11") checked else @endif @endforeach> Project-Management</label>
<label class="btn btn-primary"><input type="checkbox"name="skills[]" value="7"@foreach ($skills as $w) @if($w->skills->id=="7") checked else @endif @endforeach> Documentation</label>
</div>
<span class="text-danger error-text skills_err"></span>
<div class="form-group">
<div class="text-center">
</div>
</div>
<div class="modal-footer">
<button type="submit" id="send_form" class="btn btn-success">حفظ</button></div>
</form>

<button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">الغاء</button>
</div>
</div>
</div>
</div>
</body>




<script>
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
   $('#edite-profile').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
        $('.name_err').text('');
        $('.l_name_err').text('');
        $('.phone_err').text('');
        $('.skills_err').text('');
       $.ajax({
          type:'POST',
          url: 'update-profile',
           data: formData,
           contentType: false,
           processData: false,
           success: function(data) {
        printMsg(data);
        }
        });
        }); 
        function printMsg (msg) {
        if($.isEmptyObject(msg.error)){
            alert("تــم تحديث بياناتك بنجاح ");
        window.location.href = "/student/profile"
        }
        else{
        $.each( msg.error, function( key, value ) {
        $('.'+key+'_err').text(value);
        });
        }
        }

$( "#SendMessage" ).click(function() {
alert( "تم ارسال رساله التاكيد الى البريد الالكتروني" );
});


$(document).on('ready', function(){
  $('#photo').on('change', function(){
    $('#update').submit();
  });
});


$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
   $('#update').submit(function(e) {
       e.preventDefault();

       let formData = new FormData(this);
        $('.photo').text('');
       $.ajax({
          type:'POST',
          url: '/student/edite/photo',
           data: formData,
           contentType: false,
           processData: false,
           success: function(data) {
        printMsg(data);
        }
        });
        }); 
        function printMsg (msg) {
        if($.isEmptyObject(msg.error)){
            alert("تــم تحديث بياناتك بنجاح ");
        window.location.href = "/student/profile"
        }
        else{
        $.each( msg.error, function( key, value ) {
        $('.'+key+'_err').text(value);
        });
        }
        }



</script>

@endsection
