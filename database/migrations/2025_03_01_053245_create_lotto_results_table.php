<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('lotto_results', function (Blueprint $table) {
            $table->id();
            $table->date('draw_date')->unique(); // วันที่ออกหวย
            $table->string('first_prize')->nullable(); // รางวัลที่ 1
            $table->json('three_digit')->nullable(); // เลขหน้า & เลขท้าย 3 ตัว
            $table->string('two_digit')->nullable(); // เลขท้าย 2 ตัว
            $table->json('near_first_prize')->nullable(); // รางวัลข้างเคียงรางวัลที่ 1
            $table->json('other_prizes')->nullable(); // รางวัลที่ 2-5 และอื่นๆ
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('lotto_results');
    }
};
