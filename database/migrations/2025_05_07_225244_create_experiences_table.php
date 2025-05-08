<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company', 100);
            $table->string('first_date', 30);
            $table->string('last_date', 30);
            $table->string('description', 255);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('experiences');
    }
};
