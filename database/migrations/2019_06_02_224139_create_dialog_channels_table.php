<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDialogChannelsTable extends Migration
{
    public function up()
    {
        Schema::create('dialog_channels', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->json('user_ids');
            $table->string('channel_token');

            $table->bigInteger('owner_id')->nullable()->unsigned();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dialog_channels');
    }
}
