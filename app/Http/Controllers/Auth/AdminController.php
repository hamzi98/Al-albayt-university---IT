<?php

namespace App\Http\Controllers\Auth;

use Excel;
use App\Models\Dr;
use App\Jobs\EndJob;
use App\Models\User;
use App\Models\Admin;
use App\Models\skills;
use App\Mail\ToAllUser;


use App\Models\project;
use App\Mail\Accept_Project;
use Illuminate\Http\Request;
use App\Models\StudentNumber;
use App\Imports\StudentImport;
use App\Jobs\SendEmailToAllUser;
use App\Mail\Not_Accept_Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


public function __construct()
    {
       $this->middleware('auth:admin');
    }

public function index()
    {

        $user=count(User::all());
        $project=count(project::all());
        $StudentNumber=count(StudentNumber::all());
        $ID_std=StudentNumber::orderBy('created_at','Desc')->get();
        $users=User::paginate(5);
        $project_all=project::all();
        
        $d=Dr::paginate(5);

    return view('Admin.AdminIT',compact('user','project','StudentNumber','users','ID_std','project_all','d'));
}


public function SendEmail(Request $request){
        $messages=[
            'required' => ' مطلوب',
            'sub.max' => 'الحد المسموح لغاية 100 حرف ',
            'body.max' => 'الحد المسموح لغاية 1000 حرف ',
        ];
        $validators=Validator::make($request->all(),[
            'sub'=>'required|max:100',
            'body'=>'required|max:1000',
        ],$messages);

        if($validators->fails()) 
        return response()->json(['error'=>$validators->errors()]);
        
        $data=[
            "subject"=>$request->sub,
            "body"=>$request->body,
        ];
       dispatch(new SendEmailToAllUser($data));

}
    

public function show_profile($id_user){

    $student=User::findOrFail($id_user);
    $project=project::where('id',$student->project_id)->first();
   return view('Admin.ShowProfileUser', compact('student','project'));
          
}
    
public function AddStd(Request $request){
        $messages=[
            'required' => ' مطلوب',
            'mimes' => 'فقط  يمكن إضافة ملف Excel ',
        ];
        $validators=Validator::make($request->all(),[
            'file'=>'bail|required|mimes:csv,xls,xlsx',
        ],$messages);

        if($validators->fails()) 
        return response()->json(['error'=>$validators->errors()]);

        Excel::import(new StudentImport, $request->file);
       
}

public function DeleteStd($id){
        
        $project_number='0';
        $user=User::findOrfail($id);

        if(!empty($user->MyProject))
        $project_number=$user->MyProject;

        User::where('id',$id)->update(['project_id'=>null,'MyProject'=>null,]);
        $user->delete();

        if($project_number!='0'){
        $project=project::findOrfail($project_number);
        $project->delete();}

        return redirect('/admin');
}

public function DeleteID($id){
    
        $user=StudentNumber::findOrfail($id);
        $user->delete();

        return redirect('/admin');
    }

    public function group()
    {
        $info=project::with('Project_Admin')->get();
            return view('Admin.ShowGroup',['info'=>$info]);
}
    
public function DeleteAll()
    {
        $users=User::all();
        
        foreach ($users as $item) {
            $user=User::find($item->id);
            $user->project_id=null;
            $user->MyProject=null;
            $user->save();
            $emails[]=$user->email;
        }
     
        dispatch(new EndJob($emails));
        project::whereNotNull('id')->delete();
        User::whereNotNull('id')->delete();
        StudentNumber::whereNotNull('id')->delete();

        return redirect('/admin');
}
    
public function DeleteAllID()
    {
        StudentNumber::whereNotNull('id')->delete();
        return redirect('/admin');
}
    
public $Pass1;

public function Password(Request $request){

$Admin=Admin::where('id',Auth::id())->first();
$this->Pass1=$Admin->password;
       
        $messages=[
            'required' => ' مطلوب',
            'confirmed' => 'كلمة السر غير متطابقة',
            'min' => 'على الاقل 6 حروف',];
        $validators=Validator::make($request->all(),[
            'Oldpassword'=>[
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value,$this->Pass1)) {
                        $fail('كلمة المرور غير صحيحة');
                    }
                },
            ],
            'password'=>'bail|required|string|min:6|confirmed',
        ],$messages);

        if($validators->fails()) 
        return response()->json(['error'=>$validators->errors()]);

       Admin::where('id',Auth::id())->update(['password'=>Hash::make($request->password)]);
       Auth()->Logout();

}
    





public function Delete_Project($id){

        $project=project::findOrfail($id);

        foreach($project->std as $item){ 
        User::where('id',$item->id)->update([
        'accept'=>null,
        'project_id'=>null,
        'job'=>null,
        'MyProject'=>null,
        ]);    
        $email_user=$item->email;} //Save Email Student in array To Send email 
        $info=[
        "title"=>$project->title,
        ];
        Mail::to($email_user)->send(new Not_Accept_Project($info));
        $project->delete();
        return redirect('/admin');
    
}
 
public function Accept_Project($id){

    $project=project::findOrfail($id);

    foreach($project->std as $item){    
    $email_user=$item->email;} //Save Email Student in array To Send email 
    $info=[ "title"=>$project->title, ];
    Mail::to($email_user)->send(new Accept_Project($info));
    project::where('id',$id)->update(['accept'=>'1']);
    return redirect('/admin');

}



}











