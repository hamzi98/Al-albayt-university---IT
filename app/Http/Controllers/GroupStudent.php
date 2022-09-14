<?php
namespace App\Http\Controllers;

use App\Http\Middleware\complete_info_user;
use App\Models\post;
use App\Models\project;
use App\Models\skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Jobs\MessageToAdminGroup;

class GroupStudent extends Controller
{
public function __construct()
{
$this->middleware(['auth','verified']);
$this->middleware(complete_info_user::class,);
}

public function create_group(){
        return view('create-group');
}

//all()
public function addgroup(Request $request){

        if(empty(Auth::user()->job)){
        $messages=[
            'required' => 'حقل مطلوب',
            'in' => 'ادخال غير صحيح',
            'title.min' => 'الحد الادنى المسموح 5 حروف',
            'title.max' => 'الحد الاعلى المسموح 150 حرف',
            'dr.min' => 'الحد الادنى المسموح 4 حروف',
            'dr.max' => 'الحد الاعلى المسموح 20 حرف',
            'des.min' => ' الحد الادنى المسموح 100 حروف',
            'des.max' => 'الحد الاعلى المسموح 1000 حرف',
            'forr.max' => 'الحد الاعلى المسموح 20 حرف',
            'between' => 'ادخال غير صحيح',
            'integer' => 'ادخال غير صحيح',
            'ok.required' => ' يجب أن توافق على التعليمات',
            'digits_between' => ' ادخال غير صحيح',

            
        ];
        $validators = Validator::make($request->all(),[
                'title' =>'bail|required|min:5|max:150|',
                'type' => 'bail|required|in:تطبيق جوال,موقع اللكتروني,ذكاء اصطناعي',
                'dr' => 'bail|required|integer|between:1,31',
                'des' => 'bail|required|min:100|max:1000',
                'forr' => 'max:20',
                'FrontEnd'=> 'bail|required|integer|between:1,2',
                'BackEnd' => 'bail|required|integer|between:1,2',
                'Documentation'  => 'bail|required|integer|between:1,2',
                'DataBase' => 'bail|required|integer|between:1,2', 
                'fun_user'=> 'bail|required|integer|between:1,4' ,
                'lang'=> 'bail|required|in:Flutter,Dart,Swift,Kotlin,JavaScript,Angular,C,C#,PYTHON,JAVA,PHP' ,
                'ok'=> 'required|' ,

            ],$messages); 
    

            if($request->BackEnd==1)
            $BackEnd='مطلوب';
            else
            $BackEnd='غيرمطلوب';
           
            if($request->FrontEnd==1)
            $FrontEnd='مطلوب';
            else
            $FrontEnd='غيرمطلوب';

            if($request->Documentation==1)
            $Documentation='مطلوب';
            else
            $Documentation='غيرمطلوب';
                
            if($request->DataBase==1)
            $DataBase='مطلوب';
            else
            $DataBase='غيرمطلوب';

            if($request->fun_user==1)
            {$fun_user='BackEnd';$BackEnd='غيرمطلوب';}

            elseif($request->fun_user==2)
            {$fun_user='FrontEnd';$FrontEnd='غيرمطلوب';}

            elseif($request->fun_user==3)
            {$fun_user='Documentation';$Documentation='غيرمطلوب';}
            
            else
            {$fun_user='DataBase';$DataBase='غيرمطلوب';}

    
            if($validators->fails()) 
            return response()->json(['error'=>$validators->errors()]);
            
            else{
                project::create([
                'title'=>$request->title,
                'type'=> $request->type,
                'dr'=>$request->dr,
                'des'=>$request->des,
                'forr'=>$request->forr,
                'user_id'=>Auth::user()->id,
                'FrontEnd'=>$FrontEnd,
                'BackEnd'=>$BackEnd,
                'Documentation'=>$Documentation,
                'DataBase'=>$DataBase,
                'user_fun'=>$fun_user,
                'lang'=>$request->lang,
                ]);

                $Me=User::find(Auth::id());
                User::where('id',Auth::id())->update([
                    'project_id'=>$Me->project->id,
                    'accept'=>3,
                    'job'=>$fun_user,
                    'MyProject'=>$Me->project->id,
                ]);
                }

            return redirect('/group/Group-Profile');
            }
            elseif(!empty(Auth::user()->MyProject))
            return redirect('/student/profile');
            else
            return redirect('/student/profile');

}
  
public function add_roule($id,$job)
{
switch ($job) {
    case '1':
        $student_job="BackEnd";
        break;
    case '2':
        $student_job="FrontEnd";
        break;
    case '3':
        $student_job="Documentation";
        break;
    case '4':
        $student_job="DataBase";
        break;
    }
$proj=project::select($student_job)->where('id',$id)->first();

if($proj->$student_job=='غيرمطلوب')
return redirect('/');

project::where('id',$id)->update([$student_job=>"غيرمطلوب",]);

User::where('id',Auth::id())->update(['project_id'=>$id,
'job'=>$student_job,
'accept'=>1,]);
    
    $admin=User::where('project_id',$id)->where('accept',3)->first();

    $data=[ 
        //User
        "name"=>Auth::user()->name,
        "l_name"=>Auth::user()->l_name,
        "dep"=>Auth::user()->dep,
        "job"=>$student_job,
        "email"=>Auth::user()->email,
        "date"=>Carbon::now(),
        
        //Admin
        "admin_Fname"=>$admin->name,
        "admin_Lname"=>$admin->l_name,
        "admin_job"=>$admin->job,
        "admin_dep"=>$admin->dep,
        "admin_email"=>$admin->email,

        //project
        "title"=>$admin->project->title,
        "type"=>$admin->project->type,
        "dr"=>$admin->project->dr,
        "des"=>$admin->project->des,
        "lang"=>$admin->project->lang,

            ];

dispatch(new MessageToAdminGroup($data));
return redirect()->back()->with('success_order', 'تــم ارســال طـلبـك لمسؤول الفريق'); 
}



    }
