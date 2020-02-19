<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
// use Illuminate\Support\Str;


class BarangController extends Controller
{

    public function __construct(){
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
        return view('barang.index',[
            "barang" => Barang::orderBy('created_at','DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
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
            "nama" => "required",
            "harga_awal" => "required",
            "tanggal" => "required",
            "deskripsi_barang" => "required",
            "nama" => "required",
        ]);

        $barang  = new Barang;

        $fileName = time()."_".Str::random(32).".".$request->photo->getClientOriginalExtension();
        $request->photo->move('images',$fileName);

        $barang->photo = $fileName;
        $barang->nama = $request->nama;
        $barang->harga_awal = $request->harga_awal;
        $barang->tanggal = $request->tanggal;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->id_petugas = \Auth::user()->id;


        if($barang->save()){
            return redirect()->route('barang.show',[
                'id' => $barang->id
            ])->with('success','Data berhasil ditambah');
        }
        return redirect()->route('barang.show',[
            'id' => $barang->id
        ])->with('error','Data gagal ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barang.show',[
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
        return view('barang.edit',[
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
        $this->validate($request,[
            "nama" => "required",
            "harga_awal" => "required",
            "tanggal" => "required",
            "deskripsi_barang" => "required",
            "nama" => "required",
        ]);

        if($request->hasFile('photo')){
            if(File::exists('images/'.$barang->photo)){
                unlink('images/'.$barang->photo);
            }
            $fileName = time()."_".Str::random(32).".".$request->photo->getClientOriginalExtension();
            $request->photo->move('images',$fileName);
            $barang->photo = $fileName;
        }

        $barang->nama = $request->nama;
        $barang->harga_awal = $request->harga_awal;
        $barang->tanggal = $request->tanggal;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->id_petugas = \Auth::user()->id;

        if($barang->update()){
            return redirect()->route('barang.show',[
                'id' => $barang->id
            ])->with('success','Data berhasil diubah');
        }
        return redirect()->route('barang.show',[
            'id' => $barang->id
        ])->with('error','Data gagal diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if(File::exists('images/'.$barang->photo)){
            unlink('images/'.$barang->photo);
        }
        if($barang->delete()){
            return redirect()->route('barang.index')->with(
                "success","Data berhasil disimpan");
        }else{

            return redirect()->route('barang.index')->with(
                "error","Data gagal disimpan");
        }
    }
}
