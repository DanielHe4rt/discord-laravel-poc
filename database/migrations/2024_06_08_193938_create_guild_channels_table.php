<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('guild_channels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('guild_id')->constrained('guilds');
            $table->string('name');
            $table->integer('messages_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guild_channels');
    }
};
