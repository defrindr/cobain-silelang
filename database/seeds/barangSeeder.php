<?php

use Illuminate\Database\Seeder;
use App\Barang;
use App\Petugas;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petugas = Petugas::where(['nama' => 'operator'])->get()[0]->id;

        $data = [
        	"nama" => "Barang 1",
        	"deskripsi_barang" => "Barang ini adalah barang langka ",
        	"photo" => "barang1.png",
        	"harga_awal" => 16000,
        	"tanggal" => "2020-01-01",
        	"id_petugas" => $petugas
        ];

        Barang::create($data);

    }
}
