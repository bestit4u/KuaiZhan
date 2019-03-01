<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TestController extends Controller
{
    //
    public function postTest(Request $request){
        $baseDir = base_path();
        $logDir = storage_path('logs');
        $filename = date("ymdhis"). '.log';
        $log = $request->getContent();
        if ($log != ""){
            file_put_contents($logDir.'/'. $filename, $log, FILE_APPEND);
        }
        return ['status' => 1, 'message' => 'Post Test' ];
    }
}
