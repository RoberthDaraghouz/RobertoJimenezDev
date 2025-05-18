<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('type', 20)->nullable();
            $table->year('year')->nullable();
            $table->string('description', 255);
            $table->string('details', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('link_online', 255)->nullable();
            $table->string('link_demo', 255)->nullable();
            $table->string('link_github', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('projects');
    }
};
