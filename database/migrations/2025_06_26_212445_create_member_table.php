<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            // Kolom 'npm' sebagai integer dengan panjang 8 dan menjadi primary key.
            // Di Laravel, kita tidak mendefinisikan panjang integer seperti int(8).
            // `primary()` akan otomatis membuatnya NOT NULL dan unik.
            $table->integer('npm')->primary();

            // Kolom 'nama' sebagai varchar(50) dan tidak boleh null.
            $table->string('nama', 50);

            // Kolom 'quotes' sebagai tipe data text dan tidak boleh null.
            $table->text('quotes');

            // Kolom 'photo' sebagai varchar(255) yang boleh null.
            $table->string('photo')->nullable();

            // Kolom 'qr' sebagai varchar(255) yang boleh null.
            $table->string('qr')->nullable();

            // Kolom 'role' sebagai varchar(20) dengan nilai default 'Member'.
            $table->string('role', 20)->default('Member');

            // Laravel secara default tidak menambahkan kolom created_at dan updated_at
            // jika kita tidak menggunakan $table->timestamps(). Ini sudah sesuai dengan
            // struktur tabel Anda yang tidak memiliki kolom timestamp tersebut.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
};
