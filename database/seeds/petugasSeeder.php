<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Level;
use App\User;
use App\Petugas;

class petugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$nikOp = "";
    	$nikAd = "";
    	for($i=0;$i<16;$i++){
    		$nikAd .= random_int(0, 9);
    		$nikOp .= random_int(0, 9);
    	}


    	$level = Level::where(['nama' => 'operator'])->get()[0]->id;

        $dataUser = [
        	"username" => "operator",
        	"password" => Hash::make("operator"),
        	"id_level" => $level
        ];

        User::create($dataUser);

        $id_user = User::where(['username' => 'operator'])->get()[0]->id;

        $dataoperator = [
        	"nama" => "operator",
        	"alamat" => "Jl. manggalima No.5",
        	"nip" => $nikOp,
        	"id_user" => $id_user,
        	"photo" => "defrindr.png"
        ];

        petugas::create($dataoperator);

        // 
        
    	$level = Level::where(['nama' => 'Administrator'])->get()[0]->id;

        $dataUser = [
        	"username" => "administrator",
        	"password" => Hash::make("administrator"),
        	"id_level" => $level
        ];

        User::create($dataUser);

        $id_user = User::where(['username' => 'administrator'])->get()[0]->id;

        $dataadministrator = [
        	"nama" => "administrator",
        	"alamat" => "Jl. manggalima No.5",
        	"nip" => $nikAd,
        	"id_user" => $id_user,
        	"photo" => "defrindr.png"
        ];

        petugas::create($dataadministrator);
    }

}
