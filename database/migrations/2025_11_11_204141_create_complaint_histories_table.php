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
        Schema::create('complaint_histories', function (Blueprint $table) {
            $table->id();
            $table->text('action');
            $table->string('old_value');
            $table->string('new_value');
            $table->text('note')->nullable();
            $table->foreignId('complaint_id')->constrained('complaints')->cascadeOnDelete();
            $table->foreignId('performed_by')->constrained('users')->cascadeOnDelete();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_histories');
    }
};
