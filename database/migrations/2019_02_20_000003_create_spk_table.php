<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpkTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'spk';

    /**
     * Run the migrations.
     * @table spk
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('no_spk', 45);
            $table->string('qty', 45);
            $table->string('keterangan', 45);
            $table->string('pengiriman', 45);
            $table->string('status', 15);
            $table->unsignedInteger('barang_id');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');


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
