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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();//for external usage
            $table->string('reference_code')->unique();//for internal usage
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('priority',['LOW', 'MEDIUM', 'HIGH'])->default('medium');
            $table->enum('status',['new', 'in_progress', 'done', 'rejected'])->default('new');
            $table->foreignId('locked_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('complaint_type_id')->constrained('complaint_types')->cascadeOnDelete();
            $table->foreignId('government_agency_id')->constrained('government_agencies')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();//who make the complaint
            $table->foreignId('assigned_to')->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
