<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('petugas', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('masyarakats', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('pengaduans', function (Blueprint $table) {
            $table->foreign('masyarakat_id')->references('id')->on('masyarakats')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tanggapans', function (Blueprint $table) {
            $table->foreign('pengaduan_id')->references('id')->on('pengaduans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('petugas_id')->references('id')->on('petugas')->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropForeign(['role_id']);
        });

        Schema::table('petugas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('masyarakats', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropForeign(['masyarakat_id']);
        });

        Schema::table('tanggapans', function (Blueprint $table) {
            $table->dropForeign(['pengaduan_id']);
            $table->dropForeign(['petugas_id']);
        });
    }
}
