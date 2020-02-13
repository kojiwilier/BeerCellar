<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersDetailToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('detail')->nullable();;
            $table->string('sex')->nullable();;
            $table->date('birthday')->nullable();;
            $table->string('image')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('detail');
            $table->dropColumn('sex');
            $table->dropColumn('birthday');
            $table->dropColumn('image');
        });
    }
}
