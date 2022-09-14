<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMail;

class HomeController extends Controller
{

public function home(){
$user=count(User::all());
$post=count(post::all());
$team=count(project::all());
return view('home',compact('user','post','team'));
}

public function Conntact(Request $request){

$message=[
'required'=>"مطلوب",
'fullname.max'=>"الحد الاعلى 40 حرف",
'message.max'=>"الحد الاعلى 300 حرف",
'regex'=>"احرف فقط",
'email'=>"عنوان بريد الكتروني غير صالح",
];
$details=Validator::make($request->only('fullname','email','message'),[
'fullname'=>'bail|required|max:40|regex:/[a-zA-Z\s]+/  ',
'email'=>'bail|required|email',
'message'=>'bail|required|min:5|max:300|'
],$message);

if($details->fails())
return response()->json(['error'=>$details->errors()]);

$info = [
'fullname' => $request->fullname,
'email' => $request->email,
'message' => $request->message,
];
Mail::to('hamzi.98.it@gmail.com')->send(new ContactMail($info));

}

public function group()
{
$projects=project::with('Project_Admin')->get();
return view('group',compact('projects'));
}







}



