<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'laporan';

    /**
     * Run the migrations.
     * @table laporan
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('pengiriman', 45);
            $table->string('status', 15);
            $table->unsignedInteger('buyer_id');
            $table->unsignedInteger('po_id');
            $table->unsignedInteger('spk_id');

            $table->foreign('buyer_id')->references('id')->on('buyer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('po_id')->references('id')->on('po')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('spk_id')->references('id')->on('spk')->onDelete('cascade')->onUpdate('cascade');
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
