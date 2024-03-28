<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpticalDepoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optical_depo', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->text('comment')->nullable();
            $table->string('fo48_ads', 25)->nullable();
            $table->string('fo24_adss', 25)->nullable();
            $table->string('fo12_adss', 25)->nullable();
            $table->string('fo24', 25)->nullable();
            $table->string('fo12', 25)->nullable();
            $table->string('fo04', 25)->nullable();
            $table->string('fo2', 25)->nullable();
            $table->string('fosc', 25)->nullable();
            $table->string('fdt', 25)->nullable();
            $table->string('fdb_1_4', 25)->nullable();
            $table->string('fdb_1_8', 25)->nullable();
            $table->string('sp_1_16', 25)->nullable();
            $table->string('pp48', 25)->nullable();
            $table->string('pp24', 25)->nullable();
            $table->string('pp12', 25)->nullable();
            $table->string('patch_cord', 25)->nullable();
            $table->string('spirale', 25)->nullable();
            $table->string('shtrenguse', 25)->nullable();
            $table->string('hallka', 25)->nullable();
            $table->string('onu', 25)->nullable();
            $table->string('instalime', 25)->nullable();
            $table->date('project_date')->nullable();
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
        Schema::dropIfExists('optical_depo');
    }
}
