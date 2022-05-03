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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rak_id');
            $table->foreignId('suplaier_id');
            $table->foreignId('detail_id');
            $table->foreignId('size_id');
            $table->string('no_po');
            $table->string('plu');
            $table->text('nama_barang');
            $table->char('barcode');
            $table->char('stok');
            $table->char('harga_satuan');
            $table->char('sub_total');
            $table->timestamp('publish_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
