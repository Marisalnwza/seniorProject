<?php

namespace App\Http\Controllers;

use App\Quest;
use Illuminate\Http\Request;
use DB;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = DB::select("SELECT * from quests ORDER BY `statusQuest` = 'clear' DESC;");
        $listTask = DB::select("SELECT * from tasks;");
        $listRank = DB::select("SELECT * from ranks;");
        $user = DB::select("SELECT * from farmers WHERE id ='1';");


        foreach($list as $item){
            $name = $item->name;
            $value = $item->value;
            $statusQuest = $item->statusQuest;
            $category = $item->category;
            

            if($category=="เริ่มปลูก"){
                $count1= DB::select("SELECT name from tasks WHERE name = ?;  ",[$name]);
                // dd($count1);
                if(count($count1)>=$value && $statusQuest !== "completed"){
                    DB::update("UPDATE quests SET statusquest = 'clear' WHERE name = ? 
                    AND value = ? AND category = 'เริ่มปลูก'",[$name,$value]);
                }               
            }
            

            elseif($category=="เก็บเกี่ยว"){
                $count2  = DB::select("SELECT name from tasks WHERE name = ? AND harvest = 'เก็บเกี่ยว' ;",[$name]);
                if(count($count2)>=$value && $statusQuest !== "completed"){
                    DB::update("UPDATE quests SET statusquest = 'clear' WHERE name = ? AND value = ? 
                    AND category = 'เก็บเกี่ยว'",[$name,$value]);
                }
            }

            elseif($category=="ละทิ้ง"){
                $count3 = DB::select("SELECT name from tasks WHERE name = ? AND dropped = 'ละทิ้ง' ;",[$name]);
                if(count($count3)>=$value && $statusQuest !== "completed"){
                    DB::update("UPDATE quests SET statusquest = 'clear' 
                    WHERE name = ? AND value = ? AND category = 'ละทิ้ง'",[$name,$value]);
                }
            }
        }

        // $sumScore = DB::select("SELECT sum(quests.point) sum FROM quests 
        // WHERE quests.statusQuest='clear'; ");

        // DB::update("UPDATE farmers SET score = ? WHERE id = '1';",[$sumScore[0]->sum]);

        // // dd($sumScore);

        // foreach($user as $item){
        //     if($item->score<2000){
        //     DB::update("UPDATE farmers SET rankname = 'B' WHERE id ='1';");
        //     }
        //     if($item->score<1400){
        //         DB::update("UPDATE farmers SET rankname = 'C' WHERE id ='1';");
        //     }
        //     if($item->score<600){
        //         DB::update("UPDATE farmers SET rankname = 'D' WHERE id ='1';");
        //     }
        //     if($item->score<200){
        //         DB::update("UPDATE farmers SET rankname = 'Beginer' WHERE id ='1';");
        //     }
        //     if($item->score>=2000){
        //     DB::update("UPDATE farmers SET rankname = 'A' WHERE id ='1';");
        // }
        // }
        // dd($count1);
        

        return view('pages.quest', compact('list','count1','count2','count3','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function show(Quest $quest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quest $quest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quest $quest)
    {
        $user = DB::select("SELECT * from farmers WHERE id ='1';");
        DB::update('UPDATE quests SET statusquest = "completed" WHERE id = ?',[$quest->id]);

        $sumScore = DB::select("SELECT sum(quests.point) sum FROM quests 
        WHERE quests.statusQuest='completed'; ");

        DB::update("UPDATE farmers SET score = ? WHERE id = '1';",[$sumScore[0]->sum]);

        // dd($sumScore);

        foreach($user as $item){
            if($item->score<2000){
            DB::update("UPDATE farmers SET rankname = 'B' WHERE id ='1';");
            }
            if($item->score<1400){
                DB::update("UPDATE farmers SET rankname = 'C' WHERE id ='1';");
            }
            if($item->score<600){
                DB::update("UPDATE farmers SET rankname = 'D' WHERE id ='1';");
            }
            if($item->score<200){
                DB::update("UPDATE farmers SET rankname = 'Beginner' WHERE id ='1';");
            }
            if($item->score>=2000){
            DB::update("UPDATE farmers SET rankname = 'A' WHERE id ='1';");
        }
        }

        return redirect()->route('quest.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quest  $quest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quest $quest)
    {
        //
    }
}
