<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BetUser;
use App\BetItem;
use Auth;
use Carbon\Carbon;

class ItemController extends Controller
{
    //
    private $betitem;     
    public function __construct(){        
        $this->middleware('auth:admin');
        $this->betitem = new BetItem;     
    }
    public function itemManage(Request $request){      
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
        BetItem::cleanTable();
        $query = $this->betitem->orderby('bet_items.MatchDate')->orderby('bet_items.League')->orderby('bet_items.Home');
        if($request->kwd != null){
            $query = $query->where(function($subquery) use($request){
                $subquery->orwhere('bet_items.League','like','%'.$request->kwd.'%');
                $subquery->orwhere('bet_items.EventTitle','like','%'.$request->kwd.'%');
            });
        }
        if($request->frm != null){
            $query = $query->whereDate('bet_items.created_at','>',$request->frm);
        }
        if($request->end != null){
            $query = $query->whereDate('bet_items.created_at', '<', $request->end);
        }
        else{
            $query = $query->whereDate('bet_items.created_at', '<', now());
        }
        $limit = $request->limit != null ? $request->limit:100;
        $result = $query->paginate($limit);
        
        return view('/admin/item/item',['items' => $result,'searchObj' => ['kwd' => $request->kwd, 'frm' => $request->frm,'end' => $request->end]]);
    }
    public function deleteAllItem(Request $request){
        $validator = \Validator::make($request->all(),['ids' => 'required']);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        foreach ($request->ids as $idone)
        {
            $curitem = BetItem::whereid($idone)->first();
            if ($curitem != null)
            {
                BetItem::destroy($idone);
            }
        }
        BetItem::cleanTable();
        return ['status' => 1, 'message' => 'success', 'data' => ['status' =>true]];
    }
    public function deleteItem(Request $request){     
        $validator = \Validator::make($request->all(),['id' => 'required|exists:bet_items']);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        $curitem = BetItem::whereid($request->id)->first();
        $this->betitem->destroy($request->id);
        BetItem::cleanTable();
        return ['status' => 1, 'message' => 'success'];
    }
    public function addItem(Request $request){
        if($request->method() == 'GET'){
            return view('/admin/item/addItem');
        }
        if($request->method() == 'POST'){
        $rules = [
            'League' => 'required|string',
            'Home' => 'required|string',
            'Away' => 'required|min:6',
            'EventTitle' => 'required|string',
            'BetType' => 'required|integer',
            'strBetType' => 'string',
            'MatchDate' => 'required',
        ];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        $this->betitem->League = $request->League;
        $this->betitem->Home = $request->Home;
        $this->betitem->Away = $request->Away;
        $this->betitem->EventTitle = $request->EventTitle;
        $this->betitem->BetType = $request->BetType;
        $this->betitem->strBetType = $request->strBetType;
        $this->betitem->SideType = $request->SideType;
        $this->betitem->TeamType = $request->TeamType;
        $this->betitem->Outcome = $request->Outcome;
        $this->betitem->OutcomeClass = $request->OutcomeClass;
        $this->betitem->Goals = $request->Goals;
        $this->betitem->Hcap = $request->Hcap;
        $this->betitem->Model = $request->Model;
        $this->betitem->Back = $request->Back;
        $this->betitem->Lay = $request->Lay;
        $this->betitem->Value = $request->Value;
        $this->betitem->MatchDate = $request->MatchDate;
        $this->betitem->StrataDate = date("Y-m-d H:i:s");
        $this->betitem->save();
        BetItem::cleanTable();
        return ['status' => 1, 'message' => 'Successfully Added'];
        }
    }
    public function addList(Request $request){
        $data = json_decode($request->getContent(),true);
        $startTime = date("Y-m-d H:i:s");
        foreach ($data as $itemone){
            // $itemone = $request[$i];
            BetItem::processItem($itemone);
        }
        BetItem::where('StrataDate', '<', $startTime)->delete();
        return ['status' => 1, 'message' => 'Successfully Added'];
    }
    public function editItem(Request $request){
        $rules = [
            'id' => 'required|exists:bet_items'
        ];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        BetItem::cleanTable();
        if($request->method() == 'GET'){         
            $result = $this->betitem->where('bet_items.id',$request->id)->first();   
            return view('/admin/item/editItem',['item_data' => $result]);
        }
        if($request->method() == 'POST'){     
            $result = $this->betitem->whereid($request->id)->first(); 
            $result->League = $request->League;
            $result->Home = $request->Home;
            $result->Away = $request->Away;
            $result->EventTitle = $request->EventTitle;
            $result->BetType = $request->BetType;
            $result->strBetType = $request->strBetType;
            $result->SideType = $request->SideType;
            $result->TeamType = $request->TeamType;
            $result->Outcome = $request->Outcome;
            $result->OutcomeClass = $request->OutcomeClass;
            $result->Goals = $request->Goals;
            $result->Hcap = $request->Hcap;
            $result->Model = $request->Model;
            $result->Back = $request->Back;
            $result->Lay = $request->Lay;
            $result->Value = $request->Value;
            $result->MatchDate = $request->MatchDate;
            $result->save();
            return ['status' => 1, 'message' => 'Successfully Edited'];
        }
    }
}
