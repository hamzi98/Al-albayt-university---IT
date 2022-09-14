@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/connect.css') }}" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>تواصل</title>


    <div class="thm-container">
        <div class="row">
            <div class="col-md-8">
                <div class="contact-form-content">
                    <div class="title">
                        <span>تواصل معنا</span>
                        <h4>ارسل لنا رسالة!</h4>
                    </div>
                    <form id="conntact" method="POST" action=""  class="contact-form" >
                     @csrf
                        <input type="text" id="fullname" name="fullname" placeholder="الاسم من 3 مقاطع">
                        <span class="text-danger error-text fullname_err"></span>

                        <input type="text" id="email" name="email" placeholder="عنوان بريدك  الإلكتروني">
                        <span class="text-danger error-text email_err"></span>

                        <textarea name="message" id="message"  placeholder="الرسالة.."></textarea>
                        <span class="text-danger error-text message_err"></span>
                        <br>

                        <button type="submit" class="thm-btn yellow-bg ">إرسال</button>
                        <div class="form-result"></div>
                    </form>
                </div>
            </div>

                        
                        
<script>


$.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
   $('#conntact').submit(function(e) {
       e.preventDefault();

       let formData = new FormData(this);
        $('.fullname_err').text('');
        $('.email_err').text('');
        $('.message_err').text('');

       
       $.ajax({
          type:'POST',
          url: '/conntact',
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
            alert("تم ارسال الرسالة سيتم التواصل معك خلال 24 ساعة ");
            window.location.href = "/";

        }
        else{
        $.each( msg.error, function( key, value ) {
        $('.'+key+'_err').text(value);
        });
        }
        }

</script>

@endsection