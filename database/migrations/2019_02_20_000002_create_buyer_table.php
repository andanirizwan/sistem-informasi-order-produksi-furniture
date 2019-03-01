<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'buyer';

    /**
     * Run the migrations.
     * @table buyer
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('username', 45);
            $table->string('email', 45);
            $table->string('perusahaan', 45);
            $table->string('alamat', 45);
            $table->string('telepon', 45);
            $table->timestamps();
            $table->unsignedInteger('users_id');

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
