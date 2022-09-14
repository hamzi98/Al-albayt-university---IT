@extends('layouts.AdminApp')
<link rel="stylesheet" href="css/AdminIT.css">
<title>الادمن</title>
<style>
.table thead th {font-size: 14px;}
.table td {font-size:16px;}
</style>

@section('content')
<body>
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
<div class="h-screen flex-grow-1 overflow-y-lg-auto">
<main class="py-6 bg-surface-secondary">
<div class="container-fluid" style="text-align: center">
<div class="col-md-12 bg-light text-right">
<button style="text-align: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPush">تغيير كلمة المرور</button>

</div><br>

<div class="row g-6 mb-6">
<div class="col-xl-3 col-sm-6 col-12">
<div class="card shadow border-0">
<div class="card-body">
<div class="row">
<div class="col">
<span class="h6 font-semibold text-muted text-sm d-block mb-2"> العدد الإجمالي للطلاب المدخلة أرقامهم</span>
<span class="h3 font-bold mb-0">{{$StudentNumber}}</span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-info text-white text-lg rounded-circle">
<i class="fas fa-users"></i>                                        
</div>
</div>
</div>
<div class="mt-2 mb-0 text-sm">
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card shadow border-0">
<div class="card-body">
<div class="row">
<div class="col">
<span class="h6 font-semibold text-muted text-sm d-block mb-2"> الطلاب المسجلين</span>
<span class="h3 font-bold mb-0">{{$user}}</span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-info text-white text-lg rounded-circle">

<i class="fas fa-user-check"></i>
</div>
</div>
</div>
<div class="mt-2 mb-0 text-sm">
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<div class="card shadow border-0">
<div class="card-body">
<div class="row">
<div class="col">
<span class="h6 font-semibold text-muted text-sm d-block mb-2"> الطلاب الغير مسجلين </span>
<span class="h3 font-bold mb-0">{{$StudentNumber-$user}}</span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
<i class="fas fa-user-alt-slash"></i>

</div>
</div>
</div>
<div class="mt-2 mb-0 text-sm">
</div>
</div>
</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<div class="card shadow border-0">
<div class="card-body">
<div class="row">
<div class="col">
<span class="h6 font-semibold text-muted text-sm d-block mb-2">المشاريع المسجلة</span>
<span class="h3 font-bold mb-0">{{$project}}</span>
</div>
<div class="col-auto">
<div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
<i class="fas fa-file-search"></i>
</div>
</div>
</div>
<div class="mt-2 mb-0 text-sm">
</div>
</div>
</div>
</div>
</div>

<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 1px black;margin-bottom:50px">
<div class="row g-6 mb-6">
<div class="col-xl-3 col-sm-6 col-12">
<h5 class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">اضافة الطلاب <i class="fas fa-user-plus"></i></h5>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<h5 class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal2">مُشاهدة الارقام <i class="fas fa-eye"></i></h5>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<a href="/admin/groups"> <h5 class="btn btn-outline-success">عرض المشاريع <i class="fas fa-eye"></i></h5></a>
</div>
<div class="col-xl-3 col-sm-6 col-12">
<h5 class="btn btn-outline-danger"  data-toggle="modal" data-target="#modalConfirmDelete">إنتهاء الفصل <i class="fas fa-times"></i></h5>
</div>
</div>

<div class="col d-flex justify-content-center">
<h5 class="btn btn-outline-secondary"  data-toggle="modal" data-target="#exampleModal3">إرسال رسالة لجميع الطلاب المُسجلين <i class="fal fa-envelope"></i></h5>
</div>



<!-- New -->

<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 1px black;margin-bottom:50px">
<div class="card shadow border-0 mb-7">
<div class="card-header"><h5 class="mb-0">مشاريع تحتاج للموافقة</h5></div>
<div class="table-responsive">

    <table class="table table-hover table-nowrap" id="table_data">
        <thead class="thead-light">
        <tr>
        <th scope="col">عنوان المشروع </th>
        <th>نوع المشروع </th>
        <th>لغة المشروع </th>
        <th>القسم </th>
        <th>مشرف المشروع </th>
        <th>منشئ المجموعة </th>
        <th>المشكلة التي يحاول حلها المشروع </th>
        <th>الجهة المستفيدة من المشروع إن وجدت </th>
        <th>قـبـول | رفـض </th>
    
        </tr>
        </thead>
        <tbody>
        @foreach ($project_all as $item)
        @if($item->accept==0) 
        <tr>
        <td>{{$item->title}} </td>
        <td>{{$item->type}} </td>
        <td>{{$item->lang}} </td>
        <td>{{$item->Project_Admin->dep}} </td>
        <td> د.@php $value = \App\Models\Dr::where('id',$item->dr)->first();echo $value->name;@endphp</td>
        <td>{{$item->Project_Admin->name}} {{$item->Project_Admin->l_name}}</td>
        <td><textarea  cols="20" rows="5">{{$item->des}}</textarea></td>
        <td> @if (empty($item->forr))
        لايوجد
        @else 
        {{$item->forr}}
        @endif 
        </td>
        <td>
            <a onclick="return confirm('قبول ')" href="/admin/Accept-Project/{{$item->id}}"  class=" btn btn-outline-success"><i class="fas fa-check-circle"></i></a>
            <a onclick="return confirm('حذف ')" href="/admin/Delete-Project/{{$item->id}}"  class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
        </td>  
    
        </tr>  
        
        @endif
        @endforeach
        </tbody>
        </table>
    

<!-- End  New -->



<!-- اسماء المشرفين ومشاريعهم -->

<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 1px black;margin-bottom:50px">
<div class="card shadow border-0 mb-7">
<div class="card-header"><h5 class="mb-0">المشرفين على المشاريع </h5></div>
<div class="table-responsive">
    <table class="table table-hover table-nowrap" id="table_data">
        <thead class="thead-light">
        <tr>
        <th>اسم الدكتور/ة (المشرف/ة) </th>
        <th>عدد المشاريع  </th>    
        </tr>
        </thead>
        <tbody>
        @foreach ($d as $item)
        <tr>
        <td>{{$item->name}} </td>
        <td>@php $value = \App\Models\project::where('dr',$item->id)->get();echo count($value);@endphp</td>
        </tr>  
        @endforeach
        </tbody>
        </table>
<div class="card-footer border-0 py-5">{{ $d->links() }}</div>
<!-- النهاية -->



<hr style="border: 0; height: 0; /* Firefox... */ box-shadow: 0 0 10px 1px black;margin-bottom:50px">

<div class="card shadow border-0 mb-7">
<div class="card-header"><h5 class="mb-0">الطلاب المسجلين</h5></div>

<div class="table-responsive">
<table class="table table-hover table-nowrap">
<thead class="thead-light">
<tr>
<th scope="col"><i class="fas fa-user-circle"></i> </th>
<th scope="col">الاسم </th>
<th scope="col">الرقم الجامعي</th>
<th scope="col">البريد الالكتروني</th>
<th scope="col">الهاتف</th>
<th scope="col">اسم الشروع</th>
<th scope="col">اسم الدكتور المشرف</th>

<th scope="col">ادوات</th>

<th></th>
</tr>
</thead>
<tbody>
@foreach ($users as $item)
<tr>
<td><img alt="..."  style="margin-left:45px" src="{{asset('uploads/profile/'.$item->image)}}" class="avatar avatar-sm rounded-circle me-2"></td>
<td>{{$item->name}}</td>
<td>{{$item->id_uni}}</td>
<td>{{$item->email}}</td>
<td>{{$item->phone}}</td>

<td>{{$item->project->title ?? '-----'}}</td>
<td>
@if ($item->project_id != null)
@php 
$value = \App\Models\Dr::where('id',$item->project->dr)->first();
if(!empty($value))
echo "د.".$value->name; 
@endphp
@else
-----
@endif
</td>

<td class="text-end">
<a href="/admin/show_profile/{{$item->id}}" class="btn btn-outline-secondary">عرض</a>
<a onclick="return confirm('حذف الطالب؟')" href="/admin/Delete/{{$item->id}}"  class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<div class="card-footer border-0 py-5">
{{ $users->links() }}

</div>
</div>
</div>
</main>
</div>
</div>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> إضافة الطلاب من خلال رفع ملفExcel</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" style="text-align: right">
<span id="success"> </span>
<form method="POST" action=""  id="Add-Std" enctype="multipart/form-data">
@csrf
<input type="file" name='file' id='file'class="form-control" placeholder="الرقم الجامعي">
<span  class="text-danger error-text file_err"></span>
<br>
<div class="col-md-12 text-center">

<button style="text-align: left" type="submit" class="btn btn-primary save-post">إضافة</button>
</div>
<br>
<ol>
<p style="color: red"> إضافة اول مرةالتقيد فيما يلي </p>
<li>اسم العامود : number</li>
<li>كتابة الارقام دون فراغ</li>
<img src="{{asset('uploads/page/EXCEL.bmp')}}" alt="">
</ol>
<ol>
<p style="color: red"> إضافة ثاني وثالث و... مرةالتقيد فيما يلي </p>
<li>اسم العامود : number</li>
<li>اضافة رقم الطالب الجديد فقط دون وجود الارقام السابقه</li>

<img src="{{asset('uploads/page/EXCEL2.bmp')}}" alt="">

</ol>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
</div>
</div>
</div>
</div>


<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> أرقام الطلاب المدخلة ({{$StudentNumber}})</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" style="text-align: right">
<div class="table-responsive">
<table class="table table-hover table-nowrap" id="table_data">
<thead class="thead-light">
<tr>
<th>#</th>
<th scope="col">الرقم الجامعي </th>
<th>الحالة</th>
<th>حذف</th>
</tr>
</thead>
<tbody>
@foreach ($ID_std as $item)
<tr>
<td>{{$loop->iteration}} </td>
<td>{{$item->number}}</td>
<td>
@foreach ($users as $valu)
@if($valu->id_uni == $item->number)
لـديه حساب
@endif

@endforeach
</td>

<td class="text-end">
<a onclick="return confirm('حذف ')" href="/admin/Delete-ID/{{$item->id}}"  class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
</td>  
</tr>  
@endforeach
</tbody>
</table>

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
<a onclick="return confirm('حذف جميع الأرقام  ')" href="/admin/Delete-ID-All"  class="btn btn-danger" ><i class="bi bi-trash"> حذف جميع الارقام</i></a>

</div>
</div>
</div>
</div>


<!-- Modal 3 -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> إرسال رسالة للطلاب المُسجلين ({{$StudentNumber}})</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" style="text-align: right">
<form action="" id="Send-Message" method="post">
<input type="text" id="sub" name="sub"  class="form-control" placeholder="العنوان"><br>
<span  class="text-danger error-text sub_err"></span>

<textarea name="body" id="body" class="form-control" rows="6" placeholder="الرسالة"></textarea>
<span  class="text-danger error-text body_err"></span>

<div class="col-md-12 text-center">
<input onclick="return confirm('إرسال')" type="submit" class="btn btn-success" value="إرسال">
</div>
</form>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>

</div>
</div>
</div>
</div>




<!--Modal: modalPush-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-notify" role="document">
<!--Content-->
<div class="modal-content text-center">
<!--Header-->
<div class="modal-header d-flex justify-content-center">
<p class="heading">تغيير كلمة المرور</p>
</div>

<!--Body-->
<div class="modal-body">

<form action="" id="EditePass">

<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-key fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="Oldpassword" name="Oldpassword"   placeholder="أدخل كلمة المرور الحالية"  type="password" class="form-control" >
<span  class="text-danger error-text Oldpassword_err"></span>
</div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-lock fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="password" name="password"  placeholder="أدخل كلمة المرور الجديدة"  type="password" class="form-control"   >
<span  class="text-danger error-text password_err"></span>
</div>
</div>
<div class="d-flex flex-row align-items-center mb-4">
<i class="fas fa-lock fa-lg me-3 fa-fw"></i>
<div class="form-outline flex-fill mb-0">
<input id="password-confirm"   placeholder="  تأكيد كلمة المرور الجديدة"  type="password" class="form-control" name="password_confirmation"  autocomplete="تأكيد كلمة المرور ">
</div>
</div>
<input class="btn btn-primary" type="submit" value="حفظ">
</form>
</div>
<div class="modal-footer flex-center">
<a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">الغاء</a>
</div>
</div>

</div>
</div>







<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
<div class="modal-content text-center">
<h3 class="heading" style="margin-top: 10px">إنهاء الفصل؟</h3>
<div class="modal-header d-flex justify-content-center">
<h5> (إنهاء الفصل) يعني  حذف جميع الطلاب والمشاريع وجميع البيانات ذات الصلة </h5>
</div>
<div class="modal-body">
<i class="fas fa-times fa-4x animated rotateIn"></i>
</div>
<div class="modal-footer flex-center">
<a href="/admin/DeleteAll" class="btn  btn-outline-light">تأكيد انهاء الفصل</a>
<a type="button" style="color: black" class="btn  btn-light waves-effect" data-dismiss="modal">تراجع</a>
</div>
</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#Add-Std').submit(function(e) {
e.preventDefault();

let formData = new FormData(this);
$('.file_err').text('');       
$.ajax({
type:'POST',
url: '/admin/AddStd',
data: formData,
contentType: false,
processData: false,
success: function(data) {
printMsg1(data);
}
});
}); 
function printMsg1 (msg) {
if($.isEmptyObject(msg.error)){
alert("تــم إضافة ارقام الطلاب بنجاح  ");
window.location.href = "/admin"
}
else{
$.each( msg.error, function( key, value ) {
$('.'+key+'_err').text(value);
});
}
}



$('#Send-Message').submit(function(e) {
e.preventDefault();

let formData = new FormData(this);
$('.sub_err').text(''); 
$('.body_err').text('');       

$.ajax({
type:'POST',
url: '/admin/sendemail',
data: formData,
contentType: false,
processData: false,
success: function(data) {
printMsg2(data);
}
});
}); 
function printMsg2 (msg) {
if($.isEmptyObject(msg.error)){
alert("تــم الإرسال بـنجاح");
window.location.href = "/admin"
}
else{
$.each( msg.error, function( key, value ) {
$('.'+key+'_err').text(value);
});
}
}



$('#EditePass').submit(function(e) {
e.preventDefault();

let formData = new FormData(this);
$('.password_err').text('');    
$('.Oldpassword_err').text('');       

$.ajax({
type:'POST',
url: '/admin/Password',
data: formData,
contentType: false,
processData: false,
success: function(data) {
printMsg3(data);
}
});
}); 
function printMsg3 (msg) {
if($.isEmptyObject(msg.error)){
alert("تــم تعديل كلمة المرور بنجاح  ");
window.location.href = "/admin"
}
else{
$.each( msg.error, function( key, value ) {
$('.'+key+'_err').text(value);
});
}
}




</script>

@endsection