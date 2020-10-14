<?php

namespace App\Http\Controllers;

use App\Pump;
use Illuminate\Http\Request;
use DB;

class PumpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('pages.pump');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pumps = Pump::all();
        //dd($pumps);
        return view('pages.pump',compact('pumps',$pumps));
    }

    public function test() {
        $t = Pump::all();
        dd($t);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['onHour'=>'required','onMin'=>'required' , 'offHour'=>'required',
        'offMin'=>'required']);
        $pump = new Pump(
        ['onHour'=> $request->get('onHour'),
            'onMin'=> $request->get('onMin'),
            'offHour'=> $request->get('offHour'),
            'offMin'=> $request->get('offMin')

        ]);
        $pump->save();
        // dd($pump);
        

        return redirect()->route('pump.create')->with('success','บันทึกแน้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function show(Pump $pump)
    {
        return redirect()->route('pages.pump');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function edit(Pump $pump)
    {
        return view('pump.edit',compact('pump',$pump));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pump $pump)
    {
        $request->validate([
            'onHour'=> 'request',
            'onMin'=> 'request',
            'offHour'=> 'request',
            'offMin'=> 'request'
        ]);

        $pump->onHour = $request->onHour;
        $pump->onMin = $request->onMin;
        $pump->offHour = $request->offHour;
        $pump->offMin = $request->offMin;
        $pump->save();
        $request->session()->flash('message','Successfully');
        return redirect('pages.light');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pump  $pump
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pump $pump,Request $request)
    {
        $pump->delete();
        $request->session()->flash('message','Successfully');
        return redirect()->route('pump.create');
    }
}
