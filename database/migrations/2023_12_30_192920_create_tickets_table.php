<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->string('ticket_category_id');
            $table->string('ticket_title');
            $table->string('ticket_author');
            $table->date('ticket_date');
            $table->text('ticket_content');
            $table->string('ticket_resiver');
            $table->string('ticket_modem');
            $table->string('ticket_rg6');
            $table->string('ticket_konektor_rg6');
            $table->string('ticket_spliter');
            $table->string('ticket_konektor_tv');
            $table->string('ticket_rg11');
            $table->string('ticket_t32');
            $table->string('ticket_kupler_7402');
            $table->string('ticket_amp');
            $table->string('ticket_tap_26');
            $table->string('ticket_tap_23');
            $table->string('ticket_tap_20');
            $table->string('ticket_tap_17');
            $table->string('ticket_tap_14');
            $table->string('ticket_tap_11');
            $table->string('ticket_tap_10');
            $table->string('ticket_tap_8');
            $table->string('ticket_tap_4');

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
        Schema::dropIfExists('tickets');
    }
}
