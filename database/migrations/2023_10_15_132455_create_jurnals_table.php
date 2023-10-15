<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->foreignId('teacher_id');
            $table->foreignId('rombel_id');
            $table->foreignId('mapel_id')->nullable();
            $table->string('kd')->nullable();
            $table->string('material')->nullable();
            $table->string('task')->nullable();
            $table->integer('sakit')->nullable();
            $table->integer('izin')->nullable();
            $table->integer('alpha')->nullable();
            $table->integer('hadir')->nullable();
            $table->string('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('jurnals');
    }
};