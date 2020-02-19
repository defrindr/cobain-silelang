<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lelangs', function (Blueprint $table) {
            $table->foreign('id_masyarakat')->references('id')->on('masyarakats');
            $table->foreign('id_petugas')->references('id')->on('petugas');
            $table->foreign('id_barang')->references('id')->on('barangs');
        });

        Schema::table('history_lelangs', function (Blueprint $table) {
            $table->foreign('id_masyarakat')->references('id')->on('masyarakats');
            $table->foreign('id_lelang')->references('id')->on('lelangs');
            $table->foreign('id_barang')->references('id')->on('barangs');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_level')->references('id')->on('levels');
        });

        Schema::table('petugas', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('masyarakats', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
        
        Schema::table('barangs', function (Blueprint $table) {
            $table->foreign('id_petugas')->references('id')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lelangs', function (Blueprint $table) {
            //
        });
    }
}
