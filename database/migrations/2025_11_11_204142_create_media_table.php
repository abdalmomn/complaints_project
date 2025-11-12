<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('complaint_id')->constrained('complaints')->cascadeOnDelete();
            $table->enum('file_type', ['image', 'pdf', 'doc', 'other']);
            $table->string('extension', 10)->nullable();
            $table->string('path', 500);
            $table->string('mime_type', 100)->comment('لتسهيل التعامل الأمني');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};


