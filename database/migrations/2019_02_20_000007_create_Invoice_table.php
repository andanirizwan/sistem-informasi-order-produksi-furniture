<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Invoice';

    /**
     * Run the migrations.
     * @table Invoice
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('no_invoice');
            $table->string('file', 25);
            $table->unsignedInteger('laporan_id');
            $table->unsignedInteger('buyer_id');
            $table->unsignedInteger('po_id');

            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buyer_id')->references('id')->on('buyer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('po_id')->references('id')->on('po')->onDelete('cascade')->onUpdate('cascade');
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
