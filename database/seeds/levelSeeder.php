<?php

use Illuminate\Database\Seeder;
use App\Level;

class levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[
    			"nama" => "Adminstrator"
    		],
    		[
    			"nama" => "Operator"
    		],
    		[
    			"nama" => "Masyarakat"
    		],
    	];

    	foreach ($data as $d) {
    		Level::create($d);
    	}
    }
}
