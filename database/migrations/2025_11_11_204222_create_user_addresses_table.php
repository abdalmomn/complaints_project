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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_primary')->default(true);
            $table->enum('relationship_type', ['owner', 'resident', 'relative', 'other'])->comment('مالك، مقيم، قريب، آخر');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('address_id')->constrained('addresses')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
