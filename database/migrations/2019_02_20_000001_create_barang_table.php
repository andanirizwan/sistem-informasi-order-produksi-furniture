<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'barang';

    /**
     * Run the migrations.
     * @table barang
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('nama', 45);
            $table->string('foto', 45);
            $table->string('ukuran', 45);
            $table->string('material', 45);
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
       Schema::dropIfExists($this->tableName);
     }
}
