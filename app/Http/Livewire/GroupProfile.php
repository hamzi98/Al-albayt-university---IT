<?php
namespace App\Http\Livewire;
use App\Jobs\AcceptUser;
use App\Jobs\DeleteGroupJob;
use App\Jobs\NotAcceptUser;
use Illuminate\Support\Facades\Auth;
use App\Models\project;
use App\Models\comment;
use App\Models\post;
use Livewire\WithFileUploads;
use App\Models\like;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\accept;
use App\Mail\NotAccept;

class GroupProfile extends Component
{
  
    public $body; public $image; public $name_image="";
    public $comment_user; public $deleteIdPost; 

    use WithFileUploads;

    
public function AddPost(){

    $messages = [
    'required_without' => 'تنشر شيئ فارغ!',
    'max' => 'تجاوزت الحد المسموح (2000حرف)',
    'image' => 'تحميل صورة فقط',
    'mimes' => 'نوع غير صحيح',
    ];
    $this->validate([
    'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|',
    'body' => 'required_without:image|max:2000',
    ],$messages);
    
    if(!empty($this->image)){
        $image_post=time().'.'.$this->image->extension();
        $this->image->storeAs('public/post', $image_post);}
        else
        $image_post ="";
       
        if(!empty($this->body)){
            $body=$this->body;}
            else
            $body="";
    
        post::create([
            'image'=>$image_post,
            'body'=>$body,
            'project_id'=>Auth::user()->project_id,
            'user_id'=>Auth::user()->id,
        ]);
        $this->image=null;
        $this->body=null;
    }

    public function AddComment($post_id){

    $messages = [
        'required' => 'اكتب شيئ!',
        'max' => 'تجاوزت الحد المسموح (100حرف)',];
    $this->validate([
    'comment_user' => 'required|max:100',
    ], $messages);

    comment::create([
        'body'=>$this->comment_user,
        'post_id'=>$post_id,
        'user_id'=>Auth::id(),
    ]);
    $this->comment_user="";
    }

    public function deleteIdPost($id){$this->deleteIdPost = $id;}
    public function DeletePost(){

       $post=post::findOrfail($this->deleteIdPost);
        if(Auth::id()== $post->user_id)
        $post->delete();}


    public function DeleteComment($id){

        $comment=comment::findOrfail($id);
        if(Auth::id()== $comment->user_id)
        $comment->delete();
    }

    public function Like_Post($id,$state){
    
        $post=post::find($id)->user;
        $check=like::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
        if($post->project_id == Auth::user()->project_id){
      
        if(empty($check)){
            if($state==2){
            like::create([
            'is_like' =>2,
            'user_id' =>Auth::user()->id,
            'post_id' =>$id,
            ]);}
           else{
            like::create([
            'is_like' =>1,
            'user_id' =>Auth::user()->id,
            'post_id' =>$id,
            ]);}}
    
          else {
            $state_user=like::where('id',$check->id)->first();
            $state_is=$state_user->is_like;
    
            if($state==2 and $state_is==2 ){
            like::where('id',$check->id)->update([
                'is_like' =>0,
                ]);}
            elseif($state==1 and $state_is==1 ){
            like::where('id',$check->id)->update([
                'is_like' =>0,
                ]);}
            elseif($state==2 and $state_is==1 ){
            like::where('id',$check->id)->update([
                'is_like' =>2,
                ]);}
            elseif($state==1 and $state_is==2 ){
            like::where('id',$check->id)->update([
                'is_like' =>1,
                ]);}
            elseif($state==2 and $state_is==0 ){
            like::where('id',$check->id)->update([
                'is_like' =>2,
                ]);}
            elseif($state==1 and $state_is==0 ){
            like::where('id',$check->id)->update([
                'is_like' =>1,
                ]);}
            }
        }
    }
    
    public function accept_join_group($id_user){
        
        if(Auth::user()->accept == 3){ 
        $projects=project::findOrfail(Auth::user()->project_id)->std;
        $find=false;
        foreach($projects as $item){ 
            if($item->id==$id_user)
        $find=true;}
        
            if($find)
            User::where('id',$id_user)->update(['accept'=>2,]); 
                
            $project=project::find(Auth::user()->project_id);
            $user=User::find($id_user);
            $info=[
                "name"=>$user->name,
                "job"=>$user->job,
                "title"=>$project->title,
                "date"=>Carbon::now(),
                "email"=>$user->email,
                  ];
           
    Mail::to($user->email)->send(new accept($info));

        }
    }

    public function not_accept_join_group($id_user){
        if(Auth::user()->accept == 3){     
        $user=User::findOrfail($id_user);
        $project=project::findOrfail(Auth::user()->project_id)->std;
        $find=false;
        foreach($project as $projects){
        if($id_user == $projects->id)
             $find=true;}
       
            $post=post::where('user_id',$id_user)->get();
            $post->each->delete();

            $comment=comment::where('user_id',$id_user)->get();
            $comment->each->delete();


        if($find){
        project::where('id',$user->project_id)->update([
            $user->job => 'مطلوب',
            ]);
            User::where('id',$id_user)->update([
            'accept'=>null,
            'project_id'=>null,
            'job'=>null,
            ]);
        }

        $project=project::find(Auth::user()->project_id);
        $user=User::find($id_user);
        $info=[
            "name"=>$user->name,
            "title"=>$project->title,
            "date"=>Carbon::now(),
            "email"=>$user->email,
    ];
    
    Mail::to($user->email)->send(new NotAccept($info));


}


    }

    public function Delete_group()
    {
        if(Auth::user()->accept == 3){

        $project=project::findOrfail(Auth::user()->project_id);
        $id_group=$project->id;
        $name=$project->title;

        foreach($project->std as $item){ 
                User::where('id',$item->id)->update([
                'accept'=>null,
                'project_id'=>null,
                'job'=>null,
                'MyProject'=>null,
                ]);    
        $info[]=$item->email;} //Save Email Student in array To Send email 
       
     dispatch(new DeleteGroupJob($info,$name));
     $project->delete();
     post::where('project_id',$id_group)->delete();
     return redirect('/');}
     
    }

    public function render()
    {   if(!empty($this->image))
        $this->name_image="(تــم)";
        else
        $this->name_image="";
        $group=project::findOrfail(Auth::user()->project_id);
        $post= post::with('comment','like')->where('project_id',Auth::user()->project_id)->orderBy('id','Desc')->get();
        return view('livewire.group-profile',compact('post','group'));
    }
    

}
