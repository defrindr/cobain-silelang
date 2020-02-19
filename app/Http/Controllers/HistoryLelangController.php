<?php

namespace App\Http\Controllers;

use App\Lelang;
use App\HistoryLelang;
use Illuminate\Http\Request;

class HistoryLelangController extends Controller
{

    function __construct(){
        $this->middleware('checkAuth');
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelang = Lelang::where(['status' => 'ditutup'])->orderBy('created_at','DESC')->get();
        return view('history_lelang.index',[
            'lelang' => $lelang
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
     * @param  \App\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lelang = Lelang::where(['id' => $id,'status' => 'ditutup'])->first();
        if($lelang == null){
            return abort(404,'Not Found');
        }
        $historyLelang = HistoryLelang::where(['id_lelang' => $lelang->id])->orderBy('penawaran_harga','DESC')->get();
        return view('history_lelang.show',[
            'lelang' => $lelang,
            'historyLelang' => $historyLelang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryLelang $historyLelang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoryLelang  $historyLelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryLelang $historyLelang)
    {
        //
    }
}
