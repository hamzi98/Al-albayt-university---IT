@extends('layouts.app')
@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>مشروع التخرج</title>

<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<script src="{{ asset('js/home.js') }}"></script>
<section id="home" class="section bg-voilet bg-overlay overflow-hidden d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-7 col-lg-6">
                <div class="home-intro">

                    <h5 class="text-white" style="margin:50px 10px " ><span style="color: #000000">جامعة ال البيت </span>- كلية الأمير الحسين بن عبد الله لتكنولوجيا المعلومات</h5>
                </div>
                <h5 class="text-white" style="margin:1px 10px 180px; text-align:center" > موقع إلكتروني لمساق "مشروع التخرج"</h5>
                    </div>
                    
    <div class="shape-bottom">
        <svg viewBox="0 0 1920 310" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg replaced-svg">
            <title></title>
            <desc></desc>
            <defs></defs>
            <g id="Landing-Page" stroke="none" stroke-width="12" fill="none" fill-rule="evenodd">
                <g id="sApp-v1.0" transform="translate(0.000000, -554.000000)" fill="#ffffff">
                    <path d="M-3,551 C186.257589,757.321118 319.044414,856.322454 395.360475,848.004007 C509.834566,835.526337 561.525143,796.329212 637.731734,765.961549 C713.938325,735.593886 816.980646,681.910577 1035.72208,733.065469 C1254.46351,784.220361 1511.54925,678.92359 1539.40808,662.398665 C1567.2669,645.87374 1660.9143,591.478574 1773.19378,597.641868 C1848.04677,601.75073 1901.75645,588.357675 1934.32284,557.462704 L1934.32284,863.183395 L-3,863.183395" id="v1.0"></path>
                </g>
            </g>
        </svg>
    </div>
</section>
<section id="stats" class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 col-sm-3 text-center">
                <h1 class="text-voilet"><b>{{$user}}</b></h1>
                <div class="mb-3"></div>
                <h5>الأعضاء</h5>
            </div>
            <div class="col-5 col-sm-3 text-center">
                <h1 class="text-voilet"><b>{{$team}}</b></h1>
                <div class="mb-3"></div>
                <h5>المجموعات</h5>
            </div>
            <div class="col-5 col-sm-3 text-center">
                <h1 class="text-voilet"><b>{{$post}}</b></h1>
                <div class="mb-3"></div>
                <h5>الإعلانات</h5>
            </div>

            
        </div>
    </div>
</section>


<section id="features" class="py-5 ">
<div class="container">
<div class="row justify-content-center mb-5">
    <div class="col-12 col-md-10 col-lg-7 section-heading text-center">
        <h2> تطوير مهاراتك!</h2>
        <p>طبق مشروعك مع زملائك تبادل  المعلومات  شارك وابحث   !</p>
    </div>
    
</div>
<div class="row justify-content-center text-center">
    <div class="col-12 col-md-6 col-lg-4">
        <i class="fas fa-lightbulb fa-4x" style="color: #dd4722"></i>
        <h3 class="mb-2">الفكرة</h3>
        <p>اول شيء بدها تكون عندك الفكره!  تعرف شو مشروعك؟</p>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <i class="fas fa-users-crown fa-4x" style="color: #ffb22d"></i>
        <h3 class="mb-2">الفريق</h3>
        <p>الفريق بدك تختار الفريق بعناية لمساعدتك في تنفيذ فكرتك!</p>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <i class="fas fa-chalkboard-teacher fa-4x " style="color: #5ca8b5"></i>
        <h3 class="mb-2">مشرف المشروع</h3>
        <p>مشرف المشروع ضروري بالتأكيد واختيار مشرف المشروع بناءً  على نوع مشروعك!</p>
    </div>
</div>
</div>
</section>
<section class="our__team_section">
    <div class="container">
        <h3>البرمجة ممتعة!</h3>
        <p>مهما اختلفت لغات البرمجة ومهما تطورت، فهي ترتكز في النهاية على أساس واحد وهو التفكير المنطقي العقلاني ولا شيء دونه. لا يمكنك القفز لمسافة 3 أمتار من أول مرّة، إنما تحتاج إلى التدرّب وفهم أفضل السبل للوصول إلى هذه المسافة من قفزة واحدة فقط.

        </p>
        <div class="team-section">
            <ul class="list-unstyled">
                <li>
                    <a href="#0" class="position-relative">
                        <img src="https://i.ibb.co/njFvFLH/highres-469899783.png" alt="">
                        <div class="teamBox position-absolute">
                            <h4>PYTHON</h4>
                            <p>هي لغة برمجة عالية المستوى للأغراض العامة. تؤكد فلسفة التصميم الخاصة بها على قابلية قراءة الكود باستخدام مسافة بادئة كبيرة. تهدف بنيات لغتها ونهجها الموجه للكائنات إلى مساعدة المبرمجين على كتابة رمز منطقي واضح للمشاريع الصغيرة والكبيرة الحجم.</p>
                        </div>
                    </a>
                </li>
                <li>

                    <a href="#0" class="position-relative">
                        <img src="https://i.ibb.co/1XrN57r/swift-og.png" alt="">
                        <div class="teamBox position-absolute">
                            <h4>SWIFT</h4>
                            <p>هي لغة برمجة مجمعة للأغراض العامة ومتعددة النماذج طورتها شركة Apple Inc.</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0" class="position-relative">
                        <img src="https://i.ibb.co/yyHzbmm/6038586442907648.png" alt="">
                        <div class="teamBox position-absolute">
                            <h4>++C </h4>
                            <p>هي لغة برمجة للأغراض العامة أنشأها Bjarne Stroustrup كامتداد للغة البرمجة C ، أو "C with Classes".</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0" class="position-relative">
                        <img src="https://i.ibb.co/fDQfXGp/java-logo-vert-blk.png" alt="">
                        <div class="teamBox position-absolute">
                            <h4>JAVA</h4>
                            <p>هي لغة برمجة عالية المستوى قائمة على الفئة وموجهة للكائنات ، وهي مصممة بحيث تحتوي على أقل تبعيات تنفيذية ممكنة.</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0" class="position-relative">
                        <img src="https://i.ibb.co/zX0DhGQ/csharp.png" alt="">
                        <div class="teamBox position-absolute">
                            <h4>#C</h4>
                            <p>هي لغة برمجة للأغراض العامة ومتعددة النماذج. يشمل C # الكتابة الثابتة ، والكتابة القوية ، والنطاق المعجمي ، والإلزامي ، والتوضيحي ، والوظيفي ، والعامة ، والموجهة للكائنات ، والموجهة نحو المكونات.</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#0" class="position-relative">
                        <img src="https://i.ibb.co/B3V55jW/171-1718042-javascript-logo-png-transparent-png.png" alt="">
                        <div class="teamBox position-absolute">
                            <h4>JAVA SCRIPT</h4>
                            <p>هي لغة برمجة تعد إحدى التقنيات الأساسية لشبكة الويب العالمية ، جنبًا إلى جنب مع HTML و CSS.</p>
                        </div>
                    </a>
                </li>
                <li>
                    
                    <a href="#0" class="position-relative">
                        <img src="https://i.ibb.co/yfgn9NL/multiple-code-execution-flaws-found-in-php-programming-language.jpg" alt="">
                        <div class="teamBox position-absolute">
                            <h4>PHP</h4>
                            <p>هي لغة برمجة نصية للأغراض العامة موجهة نحو تطوير الويب.</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

@php
@endphp
@endsection
