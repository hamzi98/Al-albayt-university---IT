@extends('layouts.app')
@section('content')

<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<title>نـحـن</title>
<section class="about-section">
    <div class="container">
        <div class="row">
          <div class="col">
            <img src="{{asset('uploads/page/1.bmp')}}" class="img-fluid" alt="">
            <img src="{{asset('uploads/page/2.bmp')}}" class="img-fluid" alt="">
          </div>
        </div>
    <div class="container">
       <div class="row">
           <div class="col-lg-6 col-md-12 about-text">
               <div class="section-heading space-overflow">
                   <h1 class="section-title"> <span>   موقع  مشروع التخرج  </span> </h1>
                   <h4 class="">هذا السيناريو يتكرر كل فصل دراسي ، قررنا إيجاد حل جذري للمشكلة!</h4>
                   <br>
               </div>
               <div class="space-t-40 space-b-40">
                <p>تــم إنشاء الموقع بهدف تسهيل عملية إيجاد فريق لمشروع التخرج وتسهيل عملية التواصل فيما بينهم .</p>
             <!--
                 <p>يقوم الطالب بانشاء مشروع تخرج وتعبئة كافة تفاصيله ومن ثم يبداء الطلاب بتقديم طلب انضمام للمشروع بناءً على الشواغر المطلوبة, يتم تبادل المعلومات والاكواد من خلال المجموعة التي تم الانضمام اليها .</p>
                 <p> يحتوي الموقع على مجموعة من (المشاريع) التي تطرح من خلال الطلاب .</p>
                 <p> كل مشروع لديه صفحة مستقله(صفحة الفريق) يتم من خلالها التواصل بين اعضاء الفريق .</p>
            -->
                </div>
               <button style="margin-bottom: 5px" type="button" class="custom-btn-nav" data-toggle="modal" data-target="#modalCart">تعليمات إنشاء حساب</button><br>
               <button style="margin-bottom: 5px"  type="button" class="custom-btn-nav" data-toggle="modal" data-target="#modalCart2">تعليمات إنشاء مشروع(فريق)</button><br>
               <button style="margin-bottom: 5px"  type="button" class="custom-btn-nav" data-toggle="modal" data-target="#modalCart3">تعليمات الإنضمام للفريق</button><br>

           </div>

           <div class="col-lg-6 col-md-12 about_img space-60">
               <div class="about_img-inner">
                   <img src="{{asset('uploads/page/logo.bmp')}}" class="img-fluid" alt="img">
               </div>
           </div>
       </div>
   </div>
 </section>

<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center" id="myModalLabel">تعليمات إنشاء حساب</h4>
      </div>
      <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <tbody>
            <tr>
                <th scope="row">1</th>
                <td>اذهب الى <a href="/register">إنشاء حساب</a> </td>
              </tr>
            <tr>
            <tr>
                <th scope="row">2</th>
                <td> املأ الحقول المطلوبة بشكل صحيح </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>ثم النقر فوق "تسجيل" </td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>اذهب الى  إلى بريدك الإلكتروني (رسالة تحقق) تحتوي على تأكيد ، ثم  النقر فوق "تأكيد البريد"</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>بعد ذلك سيتم نقلك إلى الموقع ويطلب منك استكمال معلوماتك املأ الحقول المطلوبة بشكل صحيح، ثم النقر فوق "حفظ"</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>الخطوة الأخيرة هي تحديد المهارات الخاصة بك  اختر مهاراتك، ثم النقر فوق "حفظ"</td>
            </tr>
            <tr class="total">
              <th scope="row">5</th>
              <td>اصبحت الان عضو فعال في الموقع</td>
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
<!-- Modal: modalCart -->

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
                <td>اذهب الى <a href="/student/profile"> الملف الشخصي</a> </td>
              </tr>
            <tr>
            <tr>
                <th scope="row">2</th>
                <td>  النقر فوق "انشاء فريق"  </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>سيظهر لك نموذج إنشاء الفريق املأ المعلومات بشكل صحيح ثم النقر فوق "إنشاء" </td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>  ستتم إعادة توجيهك إلى صفحة خاصة في الفريق</td>
            </tr>

            <tr>
                <th scope="row">-</th>
            <td style="color: red">ادوات خاصة بك (أدمن الفريق)</td>
            </tr>
                <tr>
              <th scope="row">1</th>
              <td>مشاهدة طلبات الانضمام الى الفريق وقبولها او رفضها </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>نشر الاعلانات نصوص وصور</td>
            </tr>
            <tr class="total">
              <th scope="row">3</th>
              <td>حذف الفريق نهائيا</td>
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
<!-- Modal: modalCart -->
<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center" id="myModalLabel">تعليمات الإنضمام للمشروع (الفريق)</h4>
      </div>
      <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <tbody>
            <tr>
                <th scope="row">1</th>
                <td>اذهب الى <a href="/group/show-all"> المشاريع</a> </td>
              </tr>
            <tr>
            <tr>
                <th scope="row">2</th>
                <td>  يظهر لك المشاريع المقترحة على شكل منشورات </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>بعد قراءة المشاريع تقوم باختيار المشروع الذي يناسبك بناء على  نوع المشروع (Web,Mobile,Artificial Intelligence,...) و المشكلة التي يحاول حلها المشروع ولغة المشروع(php,c++,java,..) وعدة عوامل اخرى...</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>  بعد تحديد المشروع الذي تريد الانضمام إليه ، يجب عليك تحديد المهمة التي ستقوم بها (BackEnd - FrontEnd - Documentation - DataBase- ....) ثم انقر فوق "طلب إنضمام"</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td >ستتلقى رسالة بريد إلكتروني تفيد بأنك تقدمت بطلب للانضمام إلى المجموعة (التي اخترتها) والوظيفة (التي اخترتها) . </td>
            </tr>

            <tr>
                <th scope="row">-</th>
            <td style="color: red">  لاحظ أن لديك طلبًا واحدًا فقط لأي مجموعة تريدها. إذا قمت بتقديم طلب واحد إلى أي مجموعة ، فلا يمكنك إرسال أي طلب آخر ولا يمكنك التراجع عن الطلب </td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td>عندما يتم قبول طلبك من قبل مسؤول المجموعة ، سيتم إرسال رسالة إلى بريدك الإلكتروني لإعلامك بالموافقة على طلبك للانضمام.</td>
            </tr>
            <tr class="total">
              <th scope="row">7</th>
              <td>بعد ذلك ، يمكنك الدخول إلى صفحة الفريق الخاصة والتفاعل من خلال مشاركة الملفات والصور والأكواد ، والاطلاع على آخر التطورات في المشروع.</td>
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
<!-- Modal: modalCart -->

@endsection
