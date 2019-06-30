<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddApiTokenField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    //FUNGSI DARI MIGRATION INI ADALAH MEMBUAT KOLOM BARU
    public function up()
    {
        //
        Schema::table('users',function(Blueprint $table){
            $table->string('api_token')->after('email');
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
        Schema::table('users',function(Blueprint $table){
            $table->fropColumn('api_token');
        });
    }
}
