<?php
namespace App\Http\Controllers;
use App\Http\Middleware\complete_info_user;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\SkillsUser;
use App\Models\project;

class Student extends Controller
{
   
public function __construct()
{
$this->middleware(['auth','verified']);
$this->middleware(complete_info_user::class,['except' => ['complete_info','welcome','add_skills']]);
}

public function complete_info(Request $request)
{
$messages=[
'required' => 'حقل مطلوب',
'integer' => 'ادخال ارقام فقط',
'phone.digits' => 'رقم هاتف غير صحيح',
'unique' => 'مـستخدم ',
'image' => 'الصيغة صورة فقط',
'in' => 'ادخال غير صحيح',
];
$validators = Validator::make($request->only('dep','phone','photo'), [
'dep' => 'bail|required|in:CS,CIS,MIS',
'phone' => 'bail|required|digits:10|unique:App\Models\User,phone',
'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
],$messages);

if ($validators->fails()) 
return response()->json(['error'=>$validators->errors()]);

$image_user=time(). '.' . $request->photo->extension();
$request->photo->move(public_path('uploads/profile'),$image_user);
User::where('id', Auth::id())
->update([
'dep' => $request->dep,
'phone' => $request->phone,
'image' =>$image_user,
]);

}

public function welcome()
{
$skills=SkillsUser::where('user_id',Auth::id())->get();
return view('welcome',compact('skills'));
}

public function add_skills(Request $request){

        $validator=Validator::make($request->only('skills'),
        ['skills'=>'required|required_with:1,2,3,4,5,7,8,9,10,11,12,13,14,15,16,17,18,19',]);

        if($validator->fails())
        return redirect('/student/welcome');

        $storearray=$request->skills;
        foreach($storearray as $key=>$insert ){
        $s=['skills_id'=>$storearray[$key],'user_id'=>Auth::id(),];
        DB::table('skills_users')->insert($s);}

        return redirect('/student/welcome');
        
}

public function profile(){

$skills=SkillsUser::select('skills_id')->with('skills')->where('user_id',Auth::id())->get();
return view('profile',compact('skills'));
       
}


public function update_file(Request $request){
       
        $id=Auth::id();

        $messages=[
        'required' => 'حقل مطلوب',
        'phone.digits' => 'رقم هاتف غير صحيح',
        'unique' => 'مـستخدم ',
        'in' => 'ادخال غير صحيح',
        'regex' => 'ادخال غير صحيح',
        'name.max' => 'بحد أقصى 20 حرف',
        'l_name.max' => 'بحد أقصى 15 حرف',
        'skills.required' => 'يجب تحديد مهاره واحدة على الاقل',
        ];
        $validators = Validator::make($request->only('email','dep','phone','name','l_name','skills'), [
        'email' => 'bail|required|email|unique:users,email,'.$id.',id',
        'dep' => 'bail|required|in:CS,CIS,MIS',
        'phone' => 'bail|required|digits:10|unique:users,phone,'.$id.',id',
        'name' => 'bail|required|regex:/^[\pL\s\-]+$/u|max:20' ,
        'l_name' => 'bail|required|regex:/^[\pL\s\-]+$/u|max:15' ,
        'skills'=>'required',
        ],$messages);

        if ($validators->fails()) 
        return response()->json(['error'=>$validators->errors()]);
        
        if(Auth::user()->email != $request->email)
        Auth::user()->newEmail($request->email);
 
        User::find(Auth::id())->update([
        'dep'=>$request->dep,
        'phone'=>$request->phone,
        'name'=>$request->name,
        'l_name'=>$request->l_name,
        ]);

        SkillsUser::where('user_id', Auth::id())->delete();

        $storearray=$request->skills;
        foreach($storearray as $key=>$insert ){
            $s=['skills_id'=>$storearray[$key],'user_id'=>Auth::id(),];
            DB::table('skills_users')->insert($s);}
    
        return redirect('/student/profile');        
}

      
public function edite_photo (Request $request){

        $messages=[
        'image' => 'الصيغة صورة فقط',
        'mimes' => 'نوع غير جيد',
        'max' => 'يجب ان يكون اقل من 2 ميجا',
        ];
        $validators=Validator::make($request->only('photo'),[
        'photo' => 'bail|required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ] ,$messages );

        if ($validators->fails()) 
        return response()->json(['error'=>$validators->errors()]);

        unlink('uploads/profile/'.Auth::user()->image);

        $photo_user=time(). '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads/profile/'),$photo_user);
        User::where('id',Auth::user()->id)->update([
        'image'=>$photo_user,
        ]);
}
          
public function show_all_student(){

$users = User::paginate(8);
return view('all-users',compact('users'));
}    
public function show_profile($id_user){
      
        $student=User::findOrFail($id_user);
         $project=project::where('id',$student->project_id)->first();
        return view('show_profile', compact('student','project'));
        
}

public function resends_email(){

Auth::user()->resendPendingEmailVerificationMail();

return redirect('/student/profile');
}
public function delete_new_email(){

Auth::user()->clearPendingEmail();

return redirect('/student/profile');
}


}
