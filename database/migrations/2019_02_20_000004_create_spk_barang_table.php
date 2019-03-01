<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpkBarangTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'spk_barang';

    /**
     * Run the migrations.
     * @table spk_barang
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('spk_id');
            $table->unsignedInteger('barang_id');
            $table->unsignedInteger('buyer_id');

            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buyer_id')->references('id')->on('buyer')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
