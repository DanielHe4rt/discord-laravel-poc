<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('channel_messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('channel_id')->constrained('guild_channels');
            $table->foreignUuid('member_id')->constrained('guild_members');
            $table->string('content');
            $table->timestamps();

            $table->index(
                columns: ['channel_id', 'member_id'],
                name: 'search_channel_messages_from_user'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channel_messages');
    }
};
