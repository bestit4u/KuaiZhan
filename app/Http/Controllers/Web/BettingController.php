<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BetUser;
use App\BetItem;
use Auth;
use Carbon\Carbon;

class BettingController extends Controller
{
    //
    private $betitem;     
    public function __construct(){        
        $this->middleware('auth:web');
        $this->betitem = new BetItem;     
    }
    public function findItem(Request $request){
        if($request->method() == 'POST'){
        $rules = [
            'CountryStr' => 'required|min:24|max:24',
            'bMatch' => 'required|boolean',
            'bHandicap' => 'required|string',
            'bOU' => 'required|integer',
            'startTime' => 'required',
            'endTime' => 'required',
        ];
        $validator = \Validator::make($request->all(),$rules);
        if($validator->fails()){
            return ['status' => 0, 'message' => $validator->errors()->all()];
        }
        $query = BetItem::where('MatchDate','>=',$request->startTime)->where('MatchDate','<=',$request->endTime);
        $league_array = array();
        /////// League Seletct ---------------->>>>>>>>>>>>>>>>>>make league array
        if (substr($request->CountryStr, 0, 1) == '1'){
            array_push($league_array,'EngPr');
        }
        if (substr($request->CountryStr, 1, 1) == '1'){
            array_push($league_array,'SpaPr');
        }
        if (substr($request->CountryStr, 2, 1) == '1'){
            array_push($league_array,'EurUCL');
        }
        if (substr($request->CountryStr, 3, 1) == '1'){
            array_push($league_array,'ItaSA');
        }
        if (substr($request->CountryStr, 4, 1) == '1'){
            array_push($league_array,'GerBL1');
        }
        if (substr($request->CountryStr, 5, 1) == '1'){
            array_push($league_array,'FraL1');
        }
        if (substr($request->CountryStr, 6, 1) == '1'){
            array_push($league_array,'EurUEL');
        }
        if (substr($request->CountryStr, 7, 1) == '1'){
            array_push($league_array,'NetED');
        }
        if (substr($request->CountryStr, 8, 1) == '1'){
            array_push($league_array,'EngCh');
        }
        if (substr($request->CountryStr, 9, 1) == '1'){
            array_push($league_array,'UsaMLS');
        }
        if (substr($request->CountryStr, 10, 1) == '1'){
            array_push($league_array,'PorPL');
        }
        if (substr($request->CountryStr, 11, 1) == '1'){
            array_push($league_array,'GerBL2');
        }
        if (substr($request->CountryStr, 12, 1) == '1'){
            array_push($league_array,'ScoPr');
        }
        if (substr($request->CountryStr, 13, 1) == '1'){
            array_push($league_array,'EngL1');
        }
        if (substr($request->CountryStr, 14, 1) == '1'){
            array_push($league_array,'JapJL1');
        }
        if (substr($request->CountryStr, 15, 1) == '1'){
            array_push($league_array,'BelPL');
        }
        if (substr($request->CountryStr, 16, 1) == '1'){
            array_push($league_array,'SweAV');
        }
        if (substr($request->CountryStr, 17, 1) == '1'){
            array_push($league_array,'NorEs');
        }
        if (substr($request->CountryStr, 18, 1) == '1'){
            array_push($league_array,'BraSA');
        }
        if (substr($request->CountryStr, 19, 1) == '1'){
            array_push($league_array,'ArgPr');
        }
        if (substr($request->CountryStr, 20, 1) == '1'){
            array_push($league_array,'SwiSL');
        }
        if (substr($request->CountryStr, 21, 1) == '1'){
            array_push($league_array,'AutBL');
        }
        if (substr($request->CountryStr, 22, 1) == '1'){
            array_push($league_array,'GreSL');
        }
        if (substr($request->CountryStr, 23, 1) == '1'){
            array_push($league_array,'ChiSL');
        }
        $query = $query->whereIn('bet_items.League', $league_array);            ///////Search By league names;
        
        $query = $query->where(function($subquery) use($request){
            ///// if in case Match
            if ($request->bMatch){
                $subquery->orwhere(function($detailquery) use($request){
                    $detailquery->where('bet_items.BetType',0);
                    if ($request->valMinMatch != null){
                        $detailquery->where('bet_items.Value','>=',$request->valMinMatch);
                    }
                    if ($request->valMaxMatch != null){
                        $detailquery->where('bet_items.Value','<=',$request->valMaxMatch);
                    }
                    if ($request->modMinMatch != null){
                        $detailquery->where('bet_items.Model','>=',$request->modMinMatch);
                    }
                    if ($request->modMaxMatch != null){
                        $detailquery->where('bet_items.Model','<=',$request->modMaxMatch);
                    }
                    if ($request->oddMinMatch != null){
                        $detailquery->where('bet_items.Back','>=',$request->oddMinMatch);
                    }
                    if ($request->oddMaxMatch != null){
                        $detailquery->where('bet_items.Back','<=',$request->oddMaxMatch);
                    }   
                });
            }
            ///// if in case Handicap
            if ($request->bHandicap){
                $subquery->orwhere(function($detailquery) use($request){
                    $detailquery->where('bet_items.BetType',1);
                    if ($request->valMinHandicap != null){
                        $detailquery->where('bet_items.Value','>=',$request->valMinHandicap);
                    }
                    if ($request->valMaxHandicap != null){
                        $detailquery->where('bet_items.Value','<=',$request->valMaxHandicap);
                    }
                    if ($request->modMinHandicap != null){
                        $detailquery->where('bet_items.Model','>=',$request->modMinHandicap);    
                    }
                    if ($request->modMaxHandicap != null){
                        $detailquery->where('bet_items.Model','<=',$request->modMaxHandicap);
                    }
                    if ($request->oddMinHandicap != null){
                        $detailquery->where('bet_items.Back','>=',$request->oddMinHandicap);
                    }
                    if ($request->oddMaxHandicap != null){
                        $detailquery->where('bet_items.Back','<=',$request->oddMaxHandicap);
                    }
                });
            }
            ///// if in case Over/Under
            if ($request->bOU){
                $subquery->orwhere(function($detailquery) use($request){
                    $detailquery->where('bet_items.BetType',2);
                    if ($request->valMinOU != null){
                        $detailquery->where('bet_items.Value','>=',$request->valMinOU);
                    }
                    if ($request->valMaxOU != null){
                        $detailquery->where('bet_items.Value','<=',$request->valMaxOU);
                    }
                    if ($request->modMinOU != null){
                        $detailquery->where('bet_items.Model','>=',$request->modMinOU);
                    }
                    if ($request->modMaxOU != null){
                        $detailquery->where('bet_items.Model','<=',$request->modMaxOU);
                    }
                    if ($request->oddMinOU != null){
                        $detailquery->where('bet_items.Back','>=',$request->oddMinOU);
                    }
                    if ($request->oddMaxOU != null){
                        $detailquery->where('bet_items.Back','<=',$request->oddMaxOU);
                    }
                });
            }
        });
        $result = $query->get();
        $count = $query->count();
        return ['status' => 1, 'message' => 'result sent', 'count' => $count, 'data' => $result];
        }
    }
}
