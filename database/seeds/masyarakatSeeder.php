<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Level;
use App\User;
use App\Masyarakat;

class masyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$level = Level::where(['nama' => 'masyarakat'])->get()[0]->id;

        $dataUser = [
        	"username" => "masyarakat",
        	"password" => Hash::make("masyarakat"),
        	"id_level" => $level
        ];

        User::create($dataUser);

        $id_user = User::where(['username' => 'masyarakat'])->get()[0]->id;

        $dataMasyarakat = [
        	"nama" => "masyarakat",
        	"alamat" => "Jl. manggalima No.5",
        	"id_user" => $id_user,
        	"photo" => "/masyarakat.png"
        ];

        Masyarakat::create($dataMasyarakat);

    }
}
