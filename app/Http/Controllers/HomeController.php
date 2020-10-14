<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //
    public function pump(){
        return view('pages.pump');
    }
    public function light(){
        return view('pages.light');
    }
    public function memo(){
        return view('pages.memo');
    }
    public function create(){
        return view('pages.create');
    }
    public function farmer(){
        
        //dd(count($greenoak));
        $q = DB::select("SELECT * from quest;");
        //dd($q);
        for($i=0;$i<count($q);$i++){
            $name = $q[$i]->name;
            $value = $q[$i]->value;

            $count = DB::select("SELECT name from tasks WHERE name = ?;",[$name]);

            if(count($count)>= $value){
                DB::update("UPDATE quest SET statusquest = 'clear' WHERE name = ? AND value = ?",[$name,$value]);
            }
        }

        $user = DB::select("SELECT * from user WHERE userid ='1';");
        //dd($user);

        $rank = DB::select("SELECT * from rank;");

        $sumScore = DB::select("SELECT sum(quest.reward) sum FROM quest WHERE quest.statusquest='clear'; ");
        DB::update("UPDATE user SET point = ? WHERE userid = '1';",[$sumScore[0]->sum]);
        //dd($sumScore[0]->sum);

        for($j=0;$j<count($rank);$j++){
            $score = $rank[$j]->score;
            $rankname = $rank[$j]->rankname;
            //

            if($sumScore[0]->sum>= $score){
                //dd($score,$rankname);
                DB::update("UPDATE user SET rank = ? WHERE userid = '1';",[$rankname]);
                //dd("pp");
            }
        }


        return view('pages.farmer',['data'=>$q,'user'=>$user]);
    }
    public function history(){
        return view('pages.history');
    }
    public function setting(){
        return view('pages.setting');
    }
}
