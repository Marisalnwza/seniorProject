<?php

namespace App\Http\Controllers;

use App\Light;
use Illuminate\Http\Request;

class LightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('pages.light');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lights = Light::all();
        //dd($pumps);
        return view('pages.light',compact('lights',$lights));
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
        $light = new Light(
        ['onHour'=> $request->get('onHour'),
            'onMin'=> $request->get('onMin'),
            'offHour'=> $request->get('offHour'),
            'offMin'=> $request->get('offMin')

        ]);
        $light->save();
        // dd($pump);
        

        return redirect()->route('light.create')->with('success','บันทึกแน้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Light  $light
     * @return \Illuminate\Http\Response
     */
    public function show(Light $light)
    {
        return redirect()->route('pages.light');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Light  $light
     * @return \Illuminate\Http\Response
     */
    public function edit(Light $light)
    {
        return view('light.edit',compact('light',$light));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Light  $light
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Light $light)
    {
        $request->validate([
            'onHour'=> 'request',
            'onMin'=> 'request',
            'offHour'=> 'request',
            'offMin'=> 'request'
        ]);

        $light->onHour = $request->onHour;
        $light->onMin = $request->onMin;
        $light->offHour = $request->offHour;
        $light->offMin = $request->offMin;
        $light->save();
        $request->session()->flash('message','Successfully');
        return redirect('pages.light');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Light  $light
     * @return \Illuminate\Http\Response
     */
    public function destroy(Light $light,Request $request)
    {
        $light->delete();
        $request->session()->flash('message','Successfully');
        return redirect()->route('light.create');
    }
}
