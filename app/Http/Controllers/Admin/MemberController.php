<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BetUser;
use Auth;
use Carbon\Carbon;

class MemberController extends Controller
{
    //
    private $betuser;     
    public function __construct(){        
        $this->middleware('auth:admin');
        $this->betuser = new BetUser;     
    }
    public function memberManage(Request $request){      
        $rules = [
            'limit' => 'integer',          
            'kwd' => 'string|nullable',
            'frm' => 'date|nullable',
            'end' => 'date|nullable',
        ];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        $query = $this->betuser->orderby('bet_users.created_at','desc');
        if($request->kwd != null){
            $query = $query->where(function($subquery) use($request){
                $subquery->orwhere('bet_users.identify','like','%'.$request->kwd.'%');
                $subquery->orwhere('bet_users.member_name','like','%'.$request->kwd.'%');
            });
        }
        if($request->frm != null){
            $query = $query->whereDate('bet_users.created_at','>',$request->frm);
        }
        if($request->end != null){
            $query = $query->whereDate('bet_users.created_at', '<', $request->end);
        }
        else{
            $query = $query->whereDate('bet_users.created_at', '<', now());
        }
        $limit = $request->limit != null ? $request->limit:100;
        $result = $query->paginate($limit);
        return view('/admin/member/member',['items' => $result,'searchObj' => ['kwd' => $request->kwd, 'frm' => $request->frm,'end' => $request->end]]);
    }
    public function deleteAllMember(Request $request){
        $validator = \Validator::make($request->all(),['ids' => 'required']);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        foreach ($request->ids as $idone)
        {
            $curitem = BetUser::whereid($idone)->first();
            if ($curitem != null)
            {
                BetUser::destroy($idone);
            }
        }
        return ['status' => 1, 'message' => 'success', 'data' => ['status' =>true]];
    }
    public function deleteMember(Request $request){     
        $validator = \Validator::make($request->all(),['id' => 'required|exists:bet_users']);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        $curitem = BetUser::whereid($request->id)->first();
        $this->betuser->destroy($request->id);
        return ['status' => 1, 'message' => 'success'];
    }
    public function addMember(Request $request){
        if($request->method() == 'GET'){
            return view('/admin/member/addMember');
        }
        if($request->method() == 'POST'){
        $rules = [
            'identify' => 'required|unique:bet_users|string',
            'member_name' => 'required|string',
            'password' => 'required|min:6',
            'email' => 'required|string',
            'expired_date' => 'required',
            'enabled' => 'required|boolean'
        ];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
        return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        $this->betuser->identify = $request->identify;
        $this->betuser->member_name = $request->member_name;
        $this->betuser->email = $request->email;
        $this->betuser->expired_date = $request->expired_date;
        $this->betuser->password = bcrypt($request->password);
        $this->betuser->enabled = $request->enabled;
        
        $this->betuser->save();
        return ['status' => 1, 'message' => 'Successfully Added'];
        }
    }
    public function editMember(Request $request){
        $rules = [
            'id' => 'required|exists:bet_users'
        ];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        if($request->method() == 'GET'){         
            $result = $this->betuser->where('bet_users.id',$request->id)->first();   
            return view('/admin/member/editMember',['member_data' => $result]);
        }
        if($request->method() == 'POST'){     
            $result = $this->betuser->whereid($request->id)->first(); 
            $result->identify = $request->identify;
            $result->member_name = $request->member_name;
            $result->email = $request->email;
            $result->enabled = $request->enabled;
            $result->expired_date = $request->expired_date;
            $result->save();
            return ['status' => 1, 'message' => 'Successfully Edited'];
        }
    }
    public function changePassword(Request $request){
        $rules = [
            'id' => 'required|exists:bet_users'
        ];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        if($request->method() == 'GET'){         
            $result = $this->betuser->where('bet_users.id',$request->id)->first();   
            return view('/admin/member/changePassword',['member_data' => $result]);
        }
        if($request->method() == 'POST'){     
            $result = $this->betuser->whereid($request->id)->first(); 
            $result->password = bcrypt($request->password);
            $result->save();
            return ['status' => 1, 'message' => 'Successfully Changed'];
        }
    }
}
