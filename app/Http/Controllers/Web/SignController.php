<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Auth;
use App\User;
use App\Admin;

class SignController extends Controller
{
    //
    private $user;
    private $admin;
    
    public function __construct(){
        $this->user = new User;
        $this->admin = new Admin;
    }
    public function keepSession(Request $request)
    {
        return ['status' => 1, 'message' => 'Successed'];
    }
    public function ajaxLogin(Request $request)
    {        
        $rules = [
            'identify' => 'required|string',
            'password' => 'required|string',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if($validator->fails()){
            return ['status'=> 0, 'message' =>$validator->errors()->all()];
        }
        $result = $this->admin->where('admin_id',$request->identify)->first();         
        if($result != null){
            if(password_verify($request->password, $result->password)){
                $request->session()->put('admin_id', $result->id);
                if (Auth::guard('web')->attempt([
                    'admin_id' => $request->identify, 
                    'password' => $request->password,
                    ])) 
                {
                    return ['status'=> 1, 'message' =>'success', 'data' => $result] ;
                }
            }
        }    
        return ['status'=> 0, 'message' => 'login failed'];
    }
    public function ajaxLogout(Request $request){
        if (Auth::guard('web')->check()){
            $curmember = User::whereid(Auth::guard('web')->user()->id)->first();
            $curmember->deviceid = null;
            $curmember->save();
            Auth::guard('web')->logout();
            return ['status'=> 1, 'message' =>'success'];
        }
        return ['status'=> 0, 'message' =>'You are not login'] ;
    }
    public function ajaxExistIdentify(Request $request){
        $rules = [
            'identify' => 'required|string',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if($validator->fails()){
            return ['status' => -1, 'message' => 'Param Error'];
        }  
        $curmember = User::where('identify',$request->identify)->first();
        if ($curmember == null){
            return ['status' => 0, 'message' => 'Not Exist'];
        }
        if (isset($request->id)){
            if ($curmember->id == $request->id){
                return ['status' => 0, 'message' => 'Not Exist'];
            }
        }
        return ['status' => 1, 'message' => 'Exist'];
        
    }
}
