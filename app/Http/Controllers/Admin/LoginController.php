<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
class LoginController extends Controller
{
    //
    public function __construct() {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function login(Request $request) {
        if($request->method() == 'GET'){
            return view('admin.login',['status'=> 0]);
        }
        if($request->method() == 'POST'){
            $this->validate($request, [
                'identify' => 'required',
                'password' => 'required',
            ]);
            $curmember = Admin::where('admin_id',$request->identify)->first();
            if ($curmember != null)
            {
                if (Auth::guard('admin')->attempt([
                    'admin_id' => $request->identify, 
                    'password' => $request->password,
                    ], $request->remember)) {
                        //if successful, redirect to the dashboard
                        if ($request->method == 'app'){
                            return ['status'=> 1, 'message' =>'success', 'data' => $curmember] ;
                        }
                        return redirect()->intended(route('admin.dashboard'));
                }
            }
            return view('admin.login',['status'=> -1]);
        }
        //validate the form data
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        if($request->method() == 'GET'){
            Auth::guard('admin')->logout();
        }
        if($request->method() == 'POST'){
            Auth::guard('admin')->logout();
        }
        return redirect()->route('admin.login');
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function username() {
        // 반환할 필드를 선언한다.
        return 'identify';
    }        
    protected function register(Request $request)
    {
        if($request->method() == 'GET'){
            return view('admin.register',['status'=> 0]);
        }
        if($request->method() == 'POST'){
            $validator = \Validator::make($request->all(), [
                'identify' => 'required|unique:link_members|string',
                'member_name' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|min:9|unique:link_members',
                'password' => 'required|string|min:6|confirmed',
            ]);
            if($validator->fails()){
                return redirect()->route('admin.register')->with('message', 'Record successfully created')->withErrors($validator);
            }
            if ($request->phone != null){
                $request->phone = $this->EncodeTele($request->phone);
            }
            if ($request->office_tele != null){
                $request->office_tele = $this->EncodeTele($request->office_tele);
            }
            $position = $request->position;
            if ($request->position == ''){
                $position = $request->position_extra;
            }
            if ($position == null){
                $position = '';
            }
            $position_type = 100;
            
            $group_id = null;
            $office_id = null;
            $question_id = null;
            $question_id = intval(str_replace("number:","", $request->question_id));
            $office_id = intval(str_replace("number:","", $request->office_id));
            $curmember = null;
            if ($office_id > 0){
                $curoffice = LinkOffice::whereid($office_id)->first();
                if ($curoffice != null){
                    $office_id = $curoffice->id;
                    $group_id = $curoffice->group_id;
                }
            }
            if($office_id == 0 && $request->office_direct != null && $request->office_tele && $position_type < 3) {
                $curoffice = LinkOffice::create([
                    'office_name' => $request->office_direct,
                    'office_tele' => $request->office_tele,
                    'address' => $request->address,
                    'enabled' => 0,
                ]);
                $office_id = $curoffice->id;
                $curmember = LinkMember::create([
                    'identify' => $request->identify,
                    'member_name' => $request->member_name,
                    'phone' => $request->phone,
                    'position' => $position,
                    'office_id' => $office_id,
                    'group_id' => $group_id,
                    'password' => bcrypt($request->password),
                    'position_type' => $position_type,
                ]);
                $curoffice->leader_id = $curmember->id;
                $curoffice->save();
            }
            else{
                if ($office_id == 0){
                    $office_id = null;
                }
                $curmember = LinkMember::create([
                    'identify' => $request->identify,
                    'member_name' => $request->member_name,
                    'phone' => $request->phone,
                    'position' => $position,
                    'office_id' => $office_id,
                    'group_id' => $group_id,
                    'password' => bcrypt($request->password),
                    'position_type' => $position_type,
                ]);
            }
            if ($question_id > 0){
                LinkAnswer::create([
                    'member_id' => $curmember->id,
                    'question_id' => $question_id,
                    'answer' => $request->answer,
                ]);
            }
            return redirect()->route('admin.login');
        }
    }

    public function forgetPass(Request $request){
        if ($request->method() == 'GET'){
            return view('/admin/forgetPass');
        }
    }
}
