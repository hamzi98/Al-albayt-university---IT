@extends('layouts.app')
@section('content')
<title>الطلاب</title>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="{{ asset('css/users.css') }}" rel="stylesheet">
<style>
  body{direction: rtl; text-align: right; background: url('{{asset('uploads/page/p3.png')}}') center center no-repeat; background-size: cover; background-position: 30%; background-attachment: fixed; color: #000000;-webkit-font-smoothing: antialiased;}
</style>

<div class="container" style="margin-top: 30px">
  <div class="row">
    @foreach ($users as $item)

    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="{{asset('uploads/profile/'.$item->image)}}">
        </div>
        <div class="team-content">
          <h3 class="name">
              
            @php
            $name= explode(' ',$item->name);
            echo $name[0] ;
            $parts = explode(" ", $item->l_name );
            $lastname = array_pop($parts);
            echo "  ".$lastname ;
        @endphp

          </h3>
          @if (empty($item->job))
          <h4 class="title"> ليس له وظيفة الى الان</h4>
          @else
          <h4 class="title">{{$item->job}}</h4>
          @endif

          <a href="/student/show_profile/{{$item->id}}"><button type="button" class="btn btn-info" style="font-size: 15px " >مشاهدة الملف </button></a>
        </div>
        <!--
        <ul class="social">
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-facebook" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-twitter" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-google-plus" aria-hidden="true"></a></li>
          <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin" aria-hidden="true"></a></li>
        </ul>
      -->
      </div>
    </div>

    @endforeach




</div>
  </div>{{ $users->links() }}

@endsection