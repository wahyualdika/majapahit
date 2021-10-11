<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfileUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profile_user', function (Blueprint $table) {
        $table->id();
        $table->string('alamat')->nullable();
        $table->string('perkerjaan')->nullable();
        $table->string('nama')->nullable();
        $table->timestamp('pendidikan_terakhir')->nullable();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
