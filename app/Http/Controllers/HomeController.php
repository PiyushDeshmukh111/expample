<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');

use App\Models\User;
use App\Models\Common_model as Common_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
//use Session;
use Mail; 
use Illuminate\Support\Facades\Hash;
use Validator;

class HomeController extends Controller
{
    private $Common_model; 
    public function __construct(Common_model $Common_model){
        $this->Common_model = $Common_model; 
    }
     
    public function logout(){
        Auth::logout();
       // Session::flush();
        return redirect('/admin');
    }

    public function index(){
       $data['title']   = 'Home';
       return view('home', $data);
    }
    
    public function login(){
        $data['title']   = 'Login';
        $user_id         = session('user_id');
        if($user_id){
            return redirect('/User/my-account');
        }else{
            return view('frontEnd/login', $data);
        }
    }

    public function checkDetails(Request $request){  
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        $user = Auth::user();
        //print_r($user->user_type_id); die;
        if(empty($user)){
            Session::flash('msg', 'Wrong email or password entered');
            return redirect('/admin');
        }else{
            if($user->user_type_id == '1'){
              //  echo 'ffffffff'; die;
                return redirect('Admin/dashboard');
            }else if($user_type_id == '2'){
                return redirect('user/dashboard');
            }else{
                Session::flash('msg', 'Your session has expired');
                return redirect('/');  
            }
        }
    }
}

