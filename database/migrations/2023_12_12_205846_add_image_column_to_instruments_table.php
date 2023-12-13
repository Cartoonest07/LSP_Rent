<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnToInstrumentsTable extends Migration
{
    public function up()
    {
        Schema::table('instruments', function (Blueprint $table) {
            $table->string('image')->nullable(); // Menambahkan kolom gambar
        });
    }

    public function down()
    {
        Schema::table('instruments', function (Blueprint $table) {
            $table->dropColumn('image'); // Menghapus kolom gambar jika migration di-rollback
        });
    }
}