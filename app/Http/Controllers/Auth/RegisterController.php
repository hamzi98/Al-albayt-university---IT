<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
   
    use RegistersUsers;

   
    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest');
    }

   

    protected function validator(array $data)
    {
        $messages=[
            'required' => 'حقل مطلوب',
            'unique' => 'مـستخدم ',
            'email' => 'بريد إلكتروني خاطئ',
            'name.max' => 'بحد أقصى 20 حرف',
            'l_name.max' => 'بحد أقصى 15 حرف',
            'confirmed' => 'كلمة السر غير متطابقة',
            'digits' => 'الرقم غير صحيح ',
            'exists' => 'عذرا ، لست مُسجل لمشروع التخرج لهذا الفصل الدراسي',
            'id_uni.unique' => 'تم استخدام هذا الرقم بالفعل في حساب (إذا واجهت مشكلة تواصل معنا) ',
            'min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.',

        ];
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:20'],
            'l_name' => ['required', 'string', 'max:15'],
            'id_uni' => ['required',  'digits:10','exists:student_numbers,number','unique:users,id_uni'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ],$messages);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'id_uni' => $data['id_uni'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
