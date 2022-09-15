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
        Schema::create('tickets_', function (Blueprint $table) {
            
                $table->increments('id');
                $table->integer('event_id')->unsigned();
            //  $table->foreign('event_id')->references('id')->on('events');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                $table->boolean('approved')->default(false);
                $table->timestamp('approved_at')->nullable();
                $table->timestamps();
                $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_');
        //$table->dropForeign('tickets_event_id_foreign');
        //$table->dropColumn('event_id');
        //$table->dropForeign('tickets_user_id_foreign');
        //$table->dropColumn('user_id');
    }
}
