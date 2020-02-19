<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    function __construct(){
        $this->middleware('checkAuth');
        $this->middleware('role:Administrator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::orderBy('created_at')->get();

        return view('level.index',[
            'level' => $level
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('level.create');
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
        $this->validate($request,[
            "nama" => "required|unique:levels,nama"
        ]);

        $level = new Level;
        $level->nama = $request->nama;

        if($level->save()){
            return redirect()->route('level.index')->with(
                "success","Data berhasil disimpan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('level.edit',[
            'level' => $level]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $this->validate($request,[
            "nama" => "required|unique:levels,nama"
        ]);

        $level->nama = $request->nama;

        if($level->update()){
            $level->touch();
            
            return redirect()->route('level.index')->with(
                "success","Data berhasil disimpan");
        }else {
            return redirect()->route('level.index')->with(
                "success","Data berhasil disimpan");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        if($level->delete()){
            return redirect()->route('level.index')->with(
                "success","Data berhasil disimpan");
        }else{

            return redirect()->route('level.index')->with(
                "error","Data gagal disimpan");
        }
    }
}
