<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('fcm_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // ถ้ามีระบบล็อกอิน
            $table->string('device_token')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('fcm_tokens');
    }
};
