<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('new_password')->nullable();
            $table->rememberToken();

            $table->json('dialog_channel_ids');

            $table->string('confirm_token', 100)->nullable();
            $table->string('image')->nullable();
            $table->string('storage_original_image_path')->nullable();

            $table->enum('status', [
                'not_confirmed',
                'active', // confirmed
                'blocked',
            ])->default('not_confirmed');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
