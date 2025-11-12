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
        Schema::create('government_agencies', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('code')->nullable();//specific code for communication and search
            $table->string('agency_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(false);
            $table->foreignId('address_id')->nullable()->constrained('addresses')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('government_agencies');
    }
};
