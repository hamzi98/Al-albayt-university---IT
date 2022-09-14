<link rel="stylesheet" href="{{asset('css/ShowProfile.css')}}">
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
<title> الــطلاب</title>
<style>body{background-color: rgb(255, 255, 255)}
</style>
<div class="box">
<div id="overlay">
<div class="image" style="text-align: center;width: 200px;/* Container's dimensions */height: 200px;-webkit-border-radius: 75%;-moz-border-radius: 75%;box-shadow: 0 0 0 1px #eee;background: url('{{asset('uploads/profile/'.$student->image)}}') center center no-repeat;background-size: cover;margin: auto;margin-top: 20px;margin-bottom: -30px;align-content: center;" >
<div class="trick">
</div>
</div>

<ul class="text" style="margin-left: 50px">
    @php
    $name= explode(' ',$student->name);
    $parts = explode(" ", $student->l_name );
    echo" <p style='color: rgb(155, 64, 64);'> ".$name[0]." ".end($parts)."</p>"
    @endphp
</ul><br>

<div class="text1">
    @if($student->accept==0)
    <p>ليس عضو في اي مجموعة </p>
    @elseif($student->accept==1)
    <span >تقدم بطلب الى </span> <span style="color: brown">  ({{$project->title}} )</span>
    <p>الشاغر <span style="color: brown">  ({{$student->job}}) </span></p> <br>
    
    @elseif($student->accept==2)
    <span >عضو لدى مشروع </span> <span style="color: brown">  ({{$project->title}} )</span>
    <p>الشاغر  <span style="color: brown">  ({{$student->job}}) </span></p><br>
    
    @else
    <span style="color: brown">(مـنشـئ فريق)</span> <span style="color: brown">  ({{$project->title}} )</span>
    <p>الشاغر <span style="color: brown">  ({{$student->job}}) </span></p> <br>
    
    @endif 
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading " role="tab" id="headingOne">
<h4 class="panel-title ">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="" aria-controls="collapseOne">
<div class="title  btn btn-danger btn-outline btn-lg">معلومات الطالب</div></a></h4></div>
<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">
الاسم الاول<p class="t">{{$student->name}}</p> <hr>
الاسم الاخير<p class="t">{{$student->l_name}}</p><hr>
الرقم الجامعي <p class="t">{{$student->id_uni}}</p><hr>
التخصص<p class="t">{{$student->dep}}</p>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
<div class="title btn btn-danger btn-outline btn-lg">المهارات</div>
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
<div class="panel-body">
 <ul>
    @foreach ($student->skills as $item)
    <button type="button" style="margin: 5px" class="btn btn-primary">{{$item->skills->name}}</button>
    @endforeach
</ul>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
<div class="title btn btn-danger btn-outline btn-lg">معلومات الاتصال</div>
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
<div class="panel-body">
<label>البريد الالكتروني</label>
<p class="t">{{$student->email}}</p>
<label>الهاتف</label>
<p class="t">{{$student->phone}}</p>
</div>
</div>
</div>
</div>

