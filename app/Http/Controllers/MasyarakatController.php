<?php

namespace App\Http\Controllers;

use App\Masyarakat;
use App\User;
use App\Level;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use File;

class MasyarakatController extends Controller
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
        $masyarakat = Masyarakat::orderBy('created_at','DESC')->get();
        return view('masyarakat.index',
            [
                "masyarakat" => $masyarakat
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.create');
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

        $level = Level::where([
                                "nama" => "masyarakat"
                            ])->first()->id;
        // dd($level);

        $this->validate($request,[
            "username" => "required|unique:users,username",
            "nama" => "required",
            "password" => "required",
            "alamat" => "required",
            "photo" => "required"
        ]);

        $fileName = Str::random(32).".".$request->photo->getClientOriginalExtension();
        $request->photo->move('images',$fileName);


        $user = new User([
            "username" => $request->username,
            "password" => $request->password,
            "id_level" => $level,
        ]);

        if($user->save()){
            $masyarakat = new Masyarakat([
                "nama" => $request->nama,
                "alamat" => $request->alamat,
                "id_user" => $user->id,
                "photo" => $fileName,
            ]);

            if($masyarakat->save()){
                DB::commit();
                return redirect()->route('masyarakat.show',[
                    'masyarakat' => $masyarakat
                ])->with('success','Data berhasil ditambahkan');
            }
        }
        DB::rollback();
        return redirect()->route('masyarakat.index')->with('error','Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
        return view('masyarakat.show',[
            'masyarakat' => $masyarakat
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $masyarakat = Masyarakat::findOrFail($id);

        return view('masyarakat.edit',[
            'masyarakat' => $masyarakat,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        DB::beginTransaction();


        $user = User::findOrFail($masyarakat->id_user);

        $this->validate($request,[
            "username" => "required",
            "nama" => "required",
            "alamat" => "required",
        ]);


        if($request->hasFile('photo')){
            if(File::exists('images/'.$masyarakat->photo)){
                unlink('images/'.$masyarakat->photo);
            }
            $fileName = Str::random(32).".".$request->photo->getClientOriginalExtension();
            $request->photo->move('images',$fileName);
        } else {
            $fileName = $masyarakat->photo;
        }


        $user->username = $request->username;
        if($request->password != ""){
            $user->password = $request->password;
        }

        if($user->update()){

            $masyarakat->nama = $request->nama;
            $masyarakat->alamat = $request->alamat;
            $masyarakat->photo = $fileName;

            if($masyarakat->update()){
                DB::commit();
                return redirect()->route('masyarakat.show',[
                    'masyarakat' => $masyarakat
                ])->with('success','Data berhasil diubah');
            }
        }
        DB::rollback();
        return redirect()->route('masyarakat.index')->with('error','Data gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat)
    {
        if(File::exists('images/'.$masyarakat->photo)){
            unlink('images/'.$masyarakat->photo);
        }
        if($masyarakat->delete()){
            return redirect()->route('masyarakat.index')->with(
                "success","Data berhasil disimpan");
        }else{

            return redirect()->route('masyarakat.index')->with(
                "error","Data gagal disimpan");
        }
    }
}
