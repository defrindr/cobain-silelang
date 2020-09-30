<?php

namespace App\Http\Controllers;

use App\Lelang;
use App\Barang;
use App\Masyarakat;
use App\HistoryLelang;
use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LelangController extends Controller
{

    function __construct(){
        $this->middleware('checkAuth');
        $this->middleware('role:Administrator-Operator',['only' => [
            'edit','create','store','update','destroy'
        ]]);
        $this->middleware('role:Masyarakat',['only' => [
            'penawaran','penawaranStore'
        ]]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $lelang = Lelang::where(['status' => 'dibuka'])->orderBy('created_at','DESC')->get();
        return view('lelang.index',[
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
        $barang = Barang::orderBy('nama','ASC')->get();
        return view('lelang.create',[
            'barang' => $barang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_barang' => 'required'
        ]);

        $lelang = new Lelang;
        $lelang->id_barang = $request->id_barang;
        $lelang->id_petugas = \Auth::user()->petugas->id;
        $lelang->id_masyarakat = null;
        $lelang->harga_akhir = 0;
        $lelang->status = 'dibuka';

        if($lelang->save()){
            return redirect()->route('lelang.index')->with('success','Lelang berhasil ditambahkan');
        }
        return redirect()->route('lelang.index')->with('error','Lelang gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(Lelang $lelang)
    {
        if($lelang->status == 'ditutup'){
            return abort(404,'Not Found');
        }
        $historyLelang = HistoryLelang::where(['id_lelang' => $lelang->id])->orderBy('penawaran_harga','DESC')->get();

        return view('lelang.show',[
            'lelang' => $lelang,
            'historyLelang' => $historyLelang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lelang $lelang)
    {
        return abort(403,'Forbidden access this');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lelang $lelang)
    {
        return abort(403,'Forbidden access this');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lelang $lelang)
    {
        if($lelang->status == 'ditutup'){
            return abort(403,'Forbidden access this');
        }
        DB::beginTransaction();
        $historyLelang = HistoryLelang::where(['id_lelang' => $lelang->id])->get();
        foreach($historyLelang as $row){
            $row->delete();
        }
        if($lelang->delete()){
            DB::commit();
            return redirect()->route('lelang.index')->with('success','Data berhasil dihapus');
        }
        DB::rollback();
        return redirect()->route('lelang.index')->with('error','Data gagal dihapus');
    }

    public function tutup(lelang $lelang){
        $lelang->status = 'ditutup';
        if($lelang->save()){
            return redirect()->route('lelang.index')->with('success','Lelang berhasil dihentikan');
        }
        return redirect()->route('lelang.index')->with('error','Gagal mengubah status lelang');
    }


    public function penawaran(Lelang $lelang){
        if($lelang->status == 'ditutup'){
            return abort(404,'Not Found');
        }
        return view('lelang.penawaran',[
            'lelang' => $lelang
        ]);
    }


    public function penawaranStore(Request $r,Lelang $lelang){

        if($lelang->status == 'ditutup'){
            return abort(404,'Not Found');
        }

        $historyLelang = new HistoryLelang;
        $historyLelang->penawaran_harga = $r->penawaran_harga;
        $historyLelang->id_lelang = $lelang->id;
        $historyLelang->id_barang = $lelang->barang->id;
        $historyLelang->id_masyarakat = \Auth::user()->masyarakat->id;

        if(($lelang->harga_akhir < $historyLelang->penawaran_harga) or ($lelang->harga_akhir == null) ){
            $lelang->harga_akhir = $historyLelang->penawaran_harga;
            $lelang->id_masyarakat = \Auth::user()->masyarakat->id;
            $lelang->save();
        }


        $historyLelangShow = HistoryLelang::where(['id_lelang' => $lelang->id])->orderBy('penawaran_harga','DESC')->get();

        if($historyLelang->save()){
            return redirect()->route('lelang.show',[
                'lelang' => $lelang,
                'historyLelang' => $historyLelangShow
            ])->with('success','Penawaran berhasil diajukan');
        }
        return redirect()->route('lelang.show',[
            'lelang' => $lelang,
            'historyLelang' => $historyLelangShow
        ])->with('success','Penawaran berhasil diajukan');




    }

}
