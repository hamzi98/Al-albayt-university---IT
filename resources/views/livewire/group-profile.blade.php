<div>

    @if ($group->accept ==1)
        
  
    <title>صفحة الفريق</title>
    <style>h6,ol,ul{text-align: right;}.card-body{background-color: #ffffff}.card-header{background-color: #ffffff}.card-footer{background-color: #ffffff}</style>    
    
    <div class="container-fluid gedf-wrapper">
     <div class="row">
     <div class="col-md-3">
     <div class="card">
     <div id="news" class="card-body">

    {{-- By Admin Just -> Show requests users   --}}   

     @if(Auth::user()->accept == 3)
     @foreach ($group->std as $item)
     @if($item->accept == 1)
     <h6 style="text-align: center">طلبات الانضمام</h6><br>
     <ol style="text-align: right">
     <li>
     @php
     $name= explode(' ',$item->name);
     $l_name = explode(" ", $item->l_name );
     echo $name[0] ."  ".end($l_name) ;
     @endphp
     <p style="color:red">  {{$item->job}} </p>  
   
     <input type="hidden" id="IdUser" name="IdUser" value="{{$item->id}}">
     @csrf
     <button type="submit" onclick="confirm('هل تريد قبول الطلب؟') || event.stopImmediatePropagation()" wire:click="accept_join_group({{ $item->id }})"  class="btn btn-success" data-toggle="tooltip" >قبول </button>
     <input type="hidden" id="IdUser" name="IdUser" value="{{$item->id}}">
     @csrf
     <button type="submit" onclick="confirm('هل تريد رفض الطلب؟') || event.stopImmediatePropagation()" wire:click="not_accept_join_group({{ $item->id }})"  class="btn btn-danger" data-toggle="tooltip" >رفض </button>
     <a href="/student/show_profile/{{$item->id}}"><button type="button" class="btn btn-info" style="font-size: 15px " >شـاهد الملف</button></a>
     <hr>
     @endif
     @endforeach 
     </ul>
     @endif
     </div>
     <div class="card-body">
     <h6 style="text-align: center">الاعضاء</h6><br>
     <ol style="text-align: right">
     <span style="color: #cf0909">
     @foreach ($group->std as $item)
     @if($item->accept==2 or $item->accept==3 )
     <li><span style="color: #080808">
     @php
     $name= explode(' ',$item->name);
     $parts = explode(" ", $item->l_name );
     echo $name[0] ."  ".end($parts) ;
     @endphp
    <a href="/student/show_profile/{{$item->id}}"><button type="button" class="btn btn-info btn-sm" style="font-size: 14px " >شـاهد الملف </button></a>
    </span></span><br>
    <i style="color: #1a1818" class="fas fa-hand-point-left"></i>
   
    {{$item->job}}
    @if($item->accept==3) 
    <span style='color: #cf0909'>(مـنشـئ فريق)</span>
    @endif</li> 
     @endif
     @endforeach
     </ul></div><hr>

     <div class="card-body">
     
     <h6 style="text-align: right">معلومات المشروع</h6><br>
     <h6> عنوان المشروع : <span style="color:#296a5e"> {{$group->title}}</span></h6> 
     <h6> نوع المشروع : <span style="color:#296a5e"> {{$group->type}}</span></h6> 
     <h6> لغة المشروع  :  <span style="color:#296a5e"> {{$group->lang}}</span></h6> 
     <h6> القسم :  <span style="color:#296a5e"> {{$group->Project_Admin->dep}}</span></h6> 
     <h6> مشرف المشروع :  <span style="color:#296a5e"> د.@php $value = \App\Models\Dr::where('id',$group->dr)->first();echo $value->name;@endphp</span></h6> 
     <h6> منشئ المجموعة :  <span style="color:#296a5e">{{$group->Project_Admin->name}}</span></h6> 
     <h6> المشكلة التي يحاول حلها المشروع  :  </h6>
     <ol style="font-size: 14px;color:#296a5e">{{$group->des}}</ol>
     <h6> الجهة المستفيدة من المشروع إن وجدت :   </h6> 
     <ul style="font-size: 14px;color:#296a5e">
     <li > @if (empty($group->forr))
     لايوجد
     @else 
     {{$group->forr}}
      @endif </li> 
 
     </div>
     </div>
     </div>
     
     <div class="col-md-6 gedf-main" style="margin-top: 10px">
     <!--- \\\\\\\Post-->
     <div class="card gedf-card">
     <div class="card-header">
     <br>
     <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
     <li class="nav-item">
     <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">اضافة منشور</a>
     </li>
     </ul>
     </div>
     <div class="card-body">
     <div class="tab-content" id="myTabContent">
     <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
     <div class="form-group">
     
     
     <form  method="post" wire:submit.prevent="AddPost" enctype="multipart/form-data">
      @csrf       
     <textarea rows="4" cols="50"  class="form-control" wire:model='body'  name="body"  placeholder="اكتب هنا..."></textarea>
     @error('body') <span class="error">{{ $message }}</span> @enderror
     <div id="file-js-example" class="file has-name">
     <label class="file-label">
     <input value="{{$image}}" class="form-control" type="file" wire:model='image'  name="image" style="visibility:hidden;" > 
     <span class="form-control">
     <span class="file-icon">
     <i class="fas fa-upload"></i>
     <span class="file-name">
         @if (empty($name_image))
         تحميل صورة 
     @else
     <span style="color: #cf0909"><i class="fas fa-badge-check"></i>{{$image}}</span></label>
     @endif
     </div>
     @error('image') <span class="error">{{ $message }}</span> @enderror
     </div>
     </div>
     <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
     <div class="py-4"></div>
     </div>
     </div>
     <div class="btn-toolbar justify-content-between">
     <div class="btn-group">
     <button  type="submit" class="btn btn-primary ">نشر</button>
     </form>
     </div>
     </div>
     </div>
     </div>
     <br>
     
     @foreach($post as $posts) 
     <div class="card gedf-card">
     <div class="card-header">
     <div class="d-flex justify-content-between align-items-center">
     <div class="d-flex justify-content-between align-items-center">
     <div class="mr-2">
     <a href="/student/show_profile/{{$posts->user->id}}">
     <img style="margin-left: 15px" class="rounded-circle" width="45" src="{{asset('uploads/profile/'.$posts->user->image)}}" alt="">
     </a></div>
     <div class="ml-2">
     <div class="h5 m-0">
     @php
     $Fname=explode(' ',$posts->user->name);
     echo $Fname[0];@endphp    
     </div>
     <div class="h7 text-muted">
    
     @if ($posts->user->accept==3) 
     <span style='color: #cf0909'>{{ $posts->user->job }}(مـنشـئ فريق)</span>
     @else
     <span >{{ $posts->user->job }}</span>
     @endif
</div></div></div><div>

@if ($posts->user_id ==Auth::id())
<button type="button" wire:click="deleteIdPost({{ $posts->id }})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fal fa-trash-alt"></i></button>
@endif

</div></div></div>
     <div class="card-body">
     <div class="text-muted h7 mb-2" style="text-align: left"> <i class="fa fa-clock-o"></i>
     {{ \Carbon\Carbon::parse($posts->created_at)->diffForHumans() }} </div>
     <h5 style="text-align: right">{{ $posts->body}}</h5>
     @if(!empty($posts->image))
     <img src="{{asset('storage/post/'.$posts->image)}}" class="img-thumbnail"  style="  max-width: 100%;width: 500px;" >
     @endif
     </div>
<div class="card-footer" >
     @php
     $like=0;
     foreach($posts->like as $value) {
         if ($value->is_like ==2)
         $like+=1 ;}
     echo $like . "<a  wire:click='Like_Post( $posts->id ,2)'  style='color: #080808;cursor: pointer;'> <i style='color: rgb(10, 44, 136)'  class='fas fa-grin-alt'></i> اعجبني</a>";
     $dislike=0;
     foreach($posts->like as $value) {
         if($value->is_like==1)
         $dislike+=1;}
     echo $dislike . "<a  wire:click='Like_Post( $posts->id ,1)'  style='color: #080808;cursor: pointer;'> <i style='color: rgb(133, 56, 53)'  class='fas fa-laugh-squint'></i> اغضبني</a>";    
     @endphp
     </div>
     <div class="card-footer">
     <div class="tab-content" id="myTabContent">
     <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
     <div class="form-group">
     
     
     <form  method="post" wire:submit.prevent="AddComment({{$posts->id}})">
     @csrf           
     <label class="sr-only" for="message">post</label>
     <input  class="form-control" id="comment_user" wire:model='comment_user'  name="comment_user"  placeholder="اكتب تعليق..." autocomplete="off">
     @error('comment_user') <span class="error">{{ $message }}</span> @enderror
     </div>
     </div>
     <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
     <div class="py-4"></div>
     </div>
     </div>
     <div class="btn-group">
     <button  type="submit" class="btn btn-primary">نشر</button>
     </div>
     </form>
     </div>
     
     <div class="card-footer">
     @foreach($posts->comment as $comments)
 
     <div class="d-flex ">
     <div class="mr-2">
     <a href="/student/show_profile/{{$comments->user->id}}">
     <img style="margin-left: 15px" class="rounded-circle" width="45" src="{{asset('uploads/profile/'.$comments->user->image)}}" alt="">
     </a>
     <span style="font-size: 17px">{{$comments->body}}</span>
     <br>
 
     @php
     $Fname=explode(' ',$comments->user->name);
     echo "<span style='color:#000000;font-size: 14px;margin-right: 7px'>(".$Fname[0].")</span>";
     @endphp 
     </div>
     <div class="ml-2">
     <div class="h5 m-0">
     </div>
     <div class="h7 text-muted">
     </div>    
     </div>    
     </div>
 
     @if ($comments->user_id ==Auth::id())
     <p style="text-align: left;margin-left: 15px" class="" onclick="confirm('حذف التعليق؟') || event.stopImmediatePropagation()" wire:click="DeleteComment({{ $comments->id }})"><i style="color: #cf0909" class="fal fa-trash-alt"></i></p>
     @else
     <p style="text-align: left;margin-left: 15px"></p>
     @endif  
 
      <hr>        
     @endforeach  </p>
     </div>
     </div>
     <br>
     @endforeach
     </div>
     <div class="col-md-3">
     <div class="card gedf-card">
     <div class="card-body">
     <h5 style="text-align: right" class="card-title">تنويه</h5>
     <p style="font-size: 15px ; color:#cf0909;text-align: right">التقيد بنشر مايتعلق بالمشروع</p>
     <p style="font-size: 15px ; color:#cf0909;text-align: right">لايمكن للاعضاء مغادرة الفريق</p>
     <p style="font-size: 15px ; color:#cf0909;text-align: right">لايمكن للاعضاء الاشتراك في اكثر من فريق</p>
     <p style="font-size: 15px ; color:#cf0909;text-align: right">يمكن حذف الفريق من قبل المنشئ</p>
     
     @if(Auth::user()->accept ==3)
     <button type="submit" onclick="confirm('هل تريد حذف الفريق نهائياً؟') || event.stopImmediatePropagation()" wire:click="Delete_group()"  class="btn btn-danger" data-toggle="tooltip" >انقر لحذف الفريق نهائياً </button>
     @endif
 
     </div>
     </div>
     </div>
     </div>
     </div>
           <!-- Modal Delete Post -->
           <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">تأكيد حذف</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true close-btn">×</span>
                         </button>
                     </div>
                    <div class="modal-body">
                         <p>هل أنت متأكد من أنك تريد الحذف؟</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">لا</button>
                         <button type="button" wire:click.prevent="DeletePost()" class="btn btn-danger close-modal" data-dismiss="modal">نعم  </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 
 @else
 <div class="d-flex justify-content-center align-items-center" style="margin-top: 200px;  margin-bottom: 200px;">
    <div class="inline-block align-middle">
    <h2 class="font-weight-normal lead" style="color: bisque;background-color: rgb(0, 0, 0); font-size:30px">المشروع في انتظار قبول المشرف</h2>
    </div>
    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center" style="color: bisque"><i class="fal fa-exclamation-circle"></i></h1>
    </div> 
 @endif


 </div>