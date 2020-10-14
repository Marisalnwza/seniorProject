<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('task');
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pages.create');
        $list = Task::all();

        //$list = Task::where('id',1)->get();
        //$to = Task::find(1);

        //$to = Task::selectRaw(datediff(created_at, now()));//now
        $from = \Carbon\Carbon::now();//now
        //$diff = $to->diffInDays($from);



        return view('pages.create', compact('list','from'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($task["attributes"]->id);
        $this->validate($request,['hold'=>'required','name'=>'required' , 'status'=>'required',
        'harvest'=>'required','dropped'=>'required']);
        $task = new Task(
        ['hold'=> $request->get('hold'),
            'name'=> $request->get('name'),
            'status'=> $request->get('status'),
            'harvest'=> $request->get('harvest'),
            'dropped'=> $request->get('dropped')
        ]);
        $task->save();
        
        

        return redirect()->route('task.create')->with('success','บันทึกแน้ว');
    }


    public function test() {
        $t = Task::all();
        dd($t);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return redirect()->route('task.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task', $task));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        DB::update('UPDATE tasks SET harvest="เก็บเกี่ยว" WHERE id=?',[$task->id]);

        return redirect()->route('task.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
