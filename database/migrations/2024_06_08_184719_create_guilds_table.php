<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('guilds', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->foreignId('user_id');
            $table->string('icon_url');
            $table->integer('members_count')->default(0);
            $table->integer('messages_count')->default(0);
            $table->boolean('is_nsfw');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guilds');
    }
};
