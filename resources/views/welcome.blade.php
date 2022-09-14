@extends('layouts.app')
@section('content')
<title>مشروع التخرج</title>
<style>
input {text-align: right;}
select { text-align: right }
option { text-align: right }
body{background-color: #ffffff;}
</style>
<link rel="stylesheet"  href="{{asset('css/pro.css')}}">

@if ( empty(Auth::user()->phone) || empty(Auth::user()->image) || empty(Auth::user()->dep))
<div class="text-right">
<div class="container" style="margin-top: 50px;margin-bottom: 200px">
<div class="d-flex justify-content-center">
<div class="col-md-8">
<div class="card-header" style=" font-size: 20px"> يرجى استكمال المعلومات <i class="fas fa-keyboard"></i> </div>
<div class="card-body">

    <form  method="post"  id="complete" action="" enctype="multipart/form-data" >
        @csrf
        <div class="form-group row">
        <div class="col-md-6 ">
        <select  name="dep" id="dep" class="form-control">
        <option name="dep" id="dep"  disabled selected>تخصص الطاالب </option>
        <option name="dep"  id="dep"  value="CS" >CS</option>
        <option name="dep" id="dep" value="CIS">CIS</option>
        <option name="dep" id="dep" value="MIS">MIS</option>
        </select>
        <span class="text-danger error-text dep_err"></span>
        </div>
        </div>
        <div class="form-group row">
        <div class="col-md-6">
        <input type="text" class="form-control" autocomplete="off" name="phone" id="phone" placeholder="ادخال رقم الهاتف" >
        <span class="text-danger error-text phone_err"></span>
        </div>
        </div>
        <div class="form-group row">
        <div class="col-md-6">
        <label for="photo" class="btn">تحميل الصورة الشخصية </label>
        <input type="file" name="photo"  id="photo" style="visibility:hidden;" class="form-control">
        <span class="text-danger error-text photo_err"></span>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
        <button type="submit"  class="btn btn-success ">حفظ</button></div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>

@elseif ($skills->isEmpty())
<form id="contact_us_sk" method="post" action="/student/add-skills" style="margin-bottom: 20%;background-color:#ffffff"  >
    @csrf
    <div class="text-center">
	<h3 class="col-md-12" style="margin-top: 50px;">حدد مهارات البرمجة الخاصة بك؟</h3><br>
		<label class="btn btn-dark"><input type="checkbox" name="skills[]" value="1">++C </label>
		<label class="btn btn-dark" ><input type="checkbox" name="skills[]" value="8"> HTML</label>
		<label class="btn btn-dark"><input type="checkbox" name="skills[]" value="9"> PHP</label>
		<label class="btn btn-dark"><input type="checkbox"  name="skills[]" value="10"> JAVA</label>
</div>

<div class="text-center">
        <label class="btn btn-dark"><input type="checkbox"name="skills[]" value="2"> PYTHON</label>
		<label class="btn btn-dark  "><input type="checkbox"name="skills[]" value="3" >CSS</label>
		<label class="btn btn-dark" ><input type="checkbox"name="skills[]" value="4"> JS</label>
		<label class="btn btn-dark"><input type="checkbox"name="skills[]" value="17"> SQL</label>
</div>

<div class="text-center">
		<label class="btn btn-dark"><input type="checkbox"name="skills[]" value="18"> AJAX</label>
		<label class="btn btn-dark"><input type="checkbox"name="skills[]" value="5"> OOP</label>
        <label class="btn btn-dark"><input type="checkbox"name="skills[]" value="6"> laravel</label>
    </div>
    <div class="text-center">
        <label class="btn btn-dark"><input type="checkbox"name="skills[]" value="19"> Flutter </label>
		<label class="btn btn-dark"><input type="checkbox"name="skills[]" value="12" > Dart </label>
		<label class="btn btn-dark" ><input type="checkbox"name="skills[]" value="13"> Swift </label>
		<label class="btn btn-dark"><input type="checkbox"name="skills[]" value="14"> Kotlin </label>
        <label class="btn btn-dark"><input type="checkbox"name="skills[]" value="15"> Angular </label>

</div>
    <div class="text-center">
        <label class="btn btn-dark"><input type="checkbox"name="skills[]" value="7"> Documentation </label>
        <label class="btn btn-dark"><input type="checkbox"name="skills[]" value="16"> Data-Analysis </label>
		<label class="btn btn-dark  "><input type="checkbox"name="skills[]" value="11" > Project-Management </label>
</div>
<div class="text-center"><br>
<button type="submit" id="send_form" class="btn btn-success btn-lg ">حفظ</button></div>
</div>
</form>

@else
@php
header("Location: " . URL::to('/student/profile'), true, 302);
exit();
@endphp
@endif


<script>
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
   $('#complete').submit(function(e) {
       e.preventDefault();

       let formData = new FormData(this);
        $('.dep_err').text('');
        $('.phone_err').text('');
        $('.photo_err').text('');
       
       $.ajax({
          type:'POST',
          url: '/student/complete-info',
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
        window.location.href = "/student/profile"
        }
        else{
        $.each( msg.error, function( key, value ) {
        $('.'+key+'_err').text(value);
        });
        }
        }
    






    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist)
      alert(msg);
    

      



  </script>



@endsection
