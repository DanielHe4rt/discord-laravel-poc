<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('guild_members', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('guild_id');
            $table->foreignId('user_id');
            $table->integer('messages_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guild_members');
    }
};
