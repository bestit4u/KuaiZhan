<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\BetAdmin;
use Auth;
use Carbon\Carbon;
class SettingController extends Controller
{
    //
    private $betadmin;     
    public function __construct(){        
        $this->middleware('auth:admin');
        $this->betadmin = new BetAdmin;     
    }
    public function changePassword(Request $request){
        if($request->method() == 'GET'){         
            return view('/admin/setting/changePassword');
        }
        if($request->method() == 'POST'){     
            $result = $this->betadmin->whereid(Auth::user()->id)->first();
            if(password_verify($request->oldpass, $result->password)){
                $result->password = bcrypt($request->password);
                $result->save();
                return ['status' => 1, 'message' => 'Successfully Changed'];
            }
            return ['status' => 2, 'message' => 'Old Password is not correct'];
        }
    }
}
