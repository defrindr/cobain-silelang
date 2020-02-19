<?php

namespace App\Http\Controllers;

use App\Petugas;
use App\User;
use App\Level;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use File;

class PetugasController extends Controller
{
    
    public function __construct(){
        $this->middleware('checkAuth');
        $this->middleware('role:Administrator');
    }


    public function genNip(){
        $nip = "";
        for ($i=0; $i < 16; $i++) { 
            $nip .= random_int(0, 9);
        }

        return $nip;
    }

    public function getLevel(){
        return Level::where(
            "nama" ,"!=", "masyarakat")->orderBy('created_at','DESC')->get();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petuga = Petugas::orderBy('created_at','DESC')->get();
        return view('petugas.index',
            [
                "petugas" => $petuga
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create',[
                "level" => $this->getLevel,
                "nip" => $this->genNip()
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
        DB::beginTransaction();


        $this->validate($request,[
            "username" => "required|unique:users,username",
            "nama" => "required",
            "password" => "required",
            "id_level" => "required",
            "nip" => "required",
            "alamat" => "required",
            "photo" => "required"
        ]);

        $fileName = Str::random(32).".".$request->photo->getClientOriginalExtension();
        $request->photo->move('images',$fileName);


        $user = new User([
            "username" => $request->username,
            "password" => $request->password,
            "id_level" => $request->id_level,
        ]);

        if($user->save()){
            $petuga = new Petugas([
                "nama" => $request->nama,
                "alamat" => $request->alamat,
                "id_user" => $user->id,
                "photo" => $fileName,
                "nip" => $request->nip
            ]);

            if($petuga->save()){
                DB::commit();
                return redirect()->route('petugas.index')->with('success','Data berhasil ditambahkan');
            }
        }
        DB::rollback();
        return redirect()->route('petugas.index')->with('error','Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petuga
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petuga)
    {
        //
        return view('petugas.show',[
            'petuga' => $petuga
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petuga
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petuga)
    {

        return view('petugas.edit',[
            'petugas' => $petuga,
            'level' => $this->getLevel()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petuga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petuga)
    {
        DB::beginTransaction();

        $user = User::findOrFail($petuga->id_user);

        $this->validate($request,[
            "username" => "required",
            "nama" => "required",
            "id_level" => "required",
            "alamat" => "required",
        ]);

        if($request->hasFile('photo')){
            if(File::exists('images/'.$petuga->photo)){
                unlink('images/'.$petuga->photo);
            }
            $fileName = Str::random(32).".".$request->photo->getClientOriginalExtension();
            $request->photo->move('images',$fileName);
        } else {
            $fileName = $petuga->photo;
        }


        $user->username = $request->username;
        if($request->password != ""){
            $user->password = $request->password;
        }
        $user->id_level = $request->id_level;

        if($user->update()){

            $petuga->nama = $request->nama;
            $petuga->alamat = $request->alamat;
            $petuga->nip = $request->nip;
            $petuga->photo = $fileName;

            if($petuga->update()){
                DB::commit();
                return redirect()->route('petugas.index')->with('success','Data berhasil ditambahkan');
            }
        }
        DB::rollback();
        return redirect()->route('petugas.index')->with('error','Data gagal ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petuga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petuga)
    {
        if(\Auth::user()->id == $petuga->user->id){
            return redirect()->route('petugas.index')->with('error','Tidak dapat menghapus akun ini');
        }

        if(File::exists('images/'.$petuga->photo)){
            unlink('images/'.$petuga->photo);
        }
        if($petuga->delete()){
            return redirect()->route('petugas.index')->with(
                "success","Data berhasil disimpan");
        }else{

            return redirect()->route('petugas.index')->with(
                "error","Data gagal disimpan");
        }
    }
}
