@extends('layouts.app')
@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<title>انشئ مشروع</title>


<style>
p{
text-align: right;}
</style>

<div class="container contact-form" style="margin-top: 30px">
<div class="contact-image">
</div>

<form method="POST" action=""  id="Add-Group">
@csrf
<h3 style="text-align: center">إنشاء مشروع(فريق)</h3> <br><br>
<input type="checkbox" name="ok" id="ok" value="ok"> متأكد من أنك  فـهمت 
<a style="font-size: 17px" href data-toggle="modal" data-target="#modalCart2">تعليمات إنشاء مشروع(فريق) <i class="fas fa-external-link-alt"></i></a><br>
<span class="text-danger error-text ok_err"></span>

<hr>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input type="text" name="title" class="form-control" placeholder="عنوان المشروع *">
<span class="text-danger error-text title_err"></span>

</div>
<div class="form-group ">
<div class="col-md-20 ">
<select  name="type" id="type" class="form-control">
<option id="type"  disabled selected>نوع المشروع * </option>
<option name="type"  id="type"  value="موقع اللكتروني" > موقع اللكتروني</option>
<option name="type" id="type" value="تطبيق جوال"> تطبيق جوال</option>
<option name="type" id="type" value="ذكاء اصطناعي">ذكاء اصطناعي</option>
</select>
<span class="text-danger error-text type_err"></span>

</div>
</div>
<div class="form-group ">
<div class="col-md-20 ">
<select  name="lang" id="lang" class="form-control">
<option name="lang" id="lang"  disabled selected>لغة المشروع * </option>
<option name="lang"  id="lang"value="PHP" > PHP</option>
<option name="lang" id="lang" value="JAVA"> JAVA</option>
<option name="lang" id="lang" value="PYTHON">PYTHON</option>
<option name="lang" id="lang" value="C#">C#</option>
<option name="lang" id="lang" value="C">C</option>
<option name="lang" id="lang" value="Angular">Angular</option>
<option name="lang" id="lang" value="JavaScript">JavaScript</option>
<option name="lang" id="lang" value="Kotlin">Kotlin</option>
<option name="lang" id="lang" value="Swift">Swift</option>
<option name="lang" id="lang" value="Dart">Dart</option>
<option name="lang" id="lang" value="Flutter">Flutter</option>

</select>
<span class="text-danger error-text lang_err"></span>

</div>
</div>
<div class="form-group">


<select  name="dr" id="dr" class="form-control">
      <option  name="dr" id="dr"  disabled selected>مشرف المشروع * </option>
      <optgroup style="text-align: center" label="علم الحاسوب ">
      <option name="dr"  id="dr"value="1" > خالد محمد عبدالرحمن بطيحه
      (استاذ/عميد)</option>
      <option name="dr" id="dr" value="2">  اكرم عارف نايف مصطفى
      (استاذ/نائب عميد) </option>
      <option name="dr" id="dr" value="3">مفلح محمد مفلح الذيابات
      (استاذ/نائب عميد) </option>
      <option name="dr" id="dr" value="4">  فيصل سليمان صالح السقار
      (استاذ مشارك/رئيس قسم اكاديمي)</option>
      <option name="dr" id="dr" value="31">
      نجاح مثقال علي الشنابله
      (استاذ مساعد/مساعد عميد)</option>
      <option name="dr" id="dr" value="5"> جهاد قبيل عوده النهود
      (استاذ)</option>
      <option name="dr" id="dr" value="6"> ابتسام فارس موسى المشاقبه
      (استاذ)</option>
      <option name="dr" id="dr" value="7">  عمر علي عوده شطناوي
      (استاذ)
      </option>
      <option name="dr" id="dr" value="8">  سعد عقله محمود بني محمد
      (استاذ)
      </option>
      <option name="dr" id="dr" value="9">  رباح محمد احمد الشبول
      (استاذ مشارك)</option>
      <option name="dr" id="dr" value="10">محمد سعيد منصور البشير
      (استاذ مشارك)</option>
      <option name="dr" id="dr" value="11">  اشرف محمد سلمان العون
      (استاذ مساعد)</option>
      <option name="dr" id="dr" value="12">محمد ناصر محمود عليمات
      (مدرس)</option>
      <option name="dr" id="dr" value="13"> وائل وحيد علي القصاص
      (استاذ مساعد)</option>
      <option name="dr" id="dr" value="14">  مازن سالم حمد الزيود
      (استاذ مساعد)</option>
      <option name="dr" id="dr" value="15">  محمد مصطفى محمود المعاني
      (مدرس)</option>
      <option name="dr" id="dr" value="16">  سهير احمد محمد بني عطا
      (مدرس)</option>
      <option name="dr" id="dr" value="17"> رامي عيسى عبداللطيف جرادات
      (مدرس)</option>
      </optgroup>

      <optgroup style="text-align: center" label="نظم المعلومات ">
      <option name="dr"  id="dr"value="18" >  محمد حامد محاسن الشرعه
      (استاذ مشارك/مدير مركز)	
      </option>
      <option name="dr"  id="dr"value="19" >سيف الدين احمد علي الربابعه
      (استاذ مساعد/مدير مركز)
      </option>
      <option name="dr"  id="dr"value="20" >  بدر مثقال سعود الفواز
      (استاذ مشارك/نائب عميد)
      </option>
      <option name="dr"  id="dr"value="21" >  محمد خالد احمد الشرع
      (استاذ مشارك/رئيس قسم اكاديمي)
      </option>
      <option name="dr"  id="dr"value="22" > جهاد محمد سليمان املاوي
      (استاذ مشارك/مساعد عميد)
      </option>
      <option name="dr"  id="dr"value="23" > محمدعيسى رياض موسى الجرادات
      (استاذ)
      </option>
      <option name="dr"  id="dr"value="24" > وفاء صليبي غمار الشرفات
      (استاذ مشارك)
      </option>
      <option name="dr"  id="dr"value="25" > انس جبرين عطيه حسين
      (استاذ مشارك)
      </option>
      <option name="dr"  id="dr"value="26" > عطاالله محمود عواد الشطناوي
      (استاذ مشارك)	
      </option>
      <option name="dr"  id="dr"value="27" >  خالد محمود سليم فقيه
      (استاذ مشارك)</option>
      <option name="dr"  id="dr"value="28" > فايز سليم سليمان الخزاعله
      (استاذ مساعد)
      </option>

      <option name="dr"  id="dr"value="29" > محمد احمد راجي الكوفحي
      (مدرس) </option>
      <option name="dr"  id="dr"value="30" > فاطمة طه محمد الخوالدة
      (محاضر متفرغ) </option>

      </optgroup>
</select>



<span class="text-danger error-text dr_err"></span>
</div>

<div class="form-group">
<input type="text" name="forr" id="forr" class="form-control" placeholder="الجهة المستفيدة من المشروع إن وجدت "  />
<span class="text-danger error-text forr_err"></span>

</div>
<div class="form-group">
<textarea name="des" id="des" class="form-control" placeholder="المشكلة التي يحاول حلها المشروع *" style="width: 100%; height: 150px;"></textarea>
<span class="text-danger error-text des_err"></span>

</div>


</div>
<div class="col-md-6">

<hr style="border-color: blue">
<p style="text-align: center ; background-color:rgb(166, 199, 247)"> الفريق والمهام</p>
<hr style="border-color: blue">
<div class="form-group ">
<p> ماهو دورك في المشروع</p>
<div class="col-md-20 ">
<select  name="fun_user" id="fun_user" class="form-control">
<option name="fun_user" id="fun_user"  disabled selected>.... </option>
<option name="fun_user" id="fun_user" value="1" >BackEnd</option>
<option name="fun_user" id="fun_user" value="2">FrontEnd </option>
<option name="fun_user" id="fun_user" value="3">Documentation </option>
<option name="fun_user" id="fun_user" value="4">DataBase </option>
</select>
<span class="text-danger error-text fun_user_err"></span>

</div>
</div>
<div class="form-group ">
<p> طالب (BackEnd)</p>
<div class="col-md-20 ">
<select  name="BackEnd" id="BackEnd" class="form-control">
<option name="BackEnd" id="BackEnd"  disabled selected>.... </option>
<option name="BackEnd"  id="BackEnd"  value="1" >مطلوب</option>
<option name="BackEnd" id="BackEnd" value="2">غير مطلوب </option>
</select>
<span class="text-danger error-text BackEnd_err"></span>

</div>
</div>
<div class="form-group ">
<p> طالب (FrontEnd)</p>
<div class="col-md-20 ">
<select name="FrontEnd" id="FrontEnd" class="form-control">
<option name="FrontEnd" id="FrontEnd"  disabled selected>.... </option>
<option name="FrontEnd" id="FrontEnd"  value="1" >مطلوب</option>
<option name="FrontEnd" id="FrontEnd" value="2">غير مطلوب </option>
</select>
<span class="text-danger error-text FrontEnd_err"></span>

</div>
</div>
<div class="form-group ">
<p> طالب (Documentation)</p>
<div class="col-md-20 ">
<select name="Documentation" id="Documentation" class="form-control">
<option name="Documentation" id="Documentation"  disabled selected>.... </option>
<option name="Documentation" id="Documentation"  value="1" >مطلوب</option>
<option name="Documentation" id="Documentation" value="2">غير مطلوب </option>
</select>
<span class="text-danger error-text Documentation_err"></span>

</div>
</div>
<div class="form-group ">
<p> طالب (DataBase)</p>
<div class="col-md-20 ">
<select name="DataBase" id="DataBase" class="form-control">
<option name="DataBase" id="DataBase"  disabled selected>.... </option>
<option name="DataBase" id="DataBase"  value="1" >مطلوب</option>
<option name="DataBase" id="DataBase" value="2">غير مطلوب </option>
</select>
<span class="text-danger error-text DataBase_err"></span>

</div>
</div>

</div>
</div>
    <div class="col-md-12 text-center">

<button type="submit" style="margin-top: 30px;text-algin:center" id="send_form" class="btn btn-success">إنشاء</button></div>
</div>

</form>
</div>
<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center" id="myModalLabel">تعليمات إنشاء مشروع(فريق)</h4>
      </div>
      <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <tbody>
            <tr>
                <th scope="row">1</th>
                <td>تأكد من إدخال جميع المعلومات بطريقة صحيحة. </td>
              </tr>
            <tr>
            <tr>
                <th scope="row">3</th>
                <td>اعتمادًا على الوظائف التي تحددها على أنها "مطلوبة" ، سيتقدم الطلاب لها. </td>
            </tr>

            <tr>
                <th scope="row">-</th>
            <td style="color: red">لا يمكن تعديل معلومات المشروع بعد الإنشاء.  </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td> بعد الإنشاء ستتم إعادة توجيهك إلى صفحة خاصة للفريق.</td>
              </tr>
                <tr>
              <th scope="row">5</th>
              <td>لديك بعض الأدوات التي ستستخدمها كمدير للفريق:
              <li>قبول أو رفض طلبات الانضمام إلى الفريق </li>
              <li>حذف الفريق بشكل نهـائي</li>
              <li>إذا قبلت طالبًا ، فلا يمكنك إزالته لاحقًا من المجموعة</li>  </td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>نشر الاعلانات نصوص وصور</td>
            </tr>

          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">فهمت</button>
      </div>
    </div>
  </div>
</div>


<script>

$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
   $('#Add-Group').submit(function(e) {
       e.preventDefault();

       let formData = new FormData(this);
        $('.dr_err').text('');
        $('.title_err').text('');
        $('.des_err').text('');
        $('.forr_err').text('');
        $('.Documentation_err').text('');
        $('.DataBase_err').text('');
        $('.FrontEnd_err').text('');
        $('.BackEnd_err').text('');
        $('.fun_user_err').text('');
        $('.lang_err').text('');
        $('.type_err').text('');
        $('.ok_err').text('');
       $.ajax({
          type:'POST',
          url: '/group/add-group',
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
            alert("تــم إنشاء الفريق بنجاح ");
        window.location.href = "/group/Group-Profile"
        }
        else{
        $.each( msg.error, function( key, value ) {
        $('.'+key+'_err').text(value);
        });
        }
        }
     



   </script>
@endsection