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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('government_agency_id')->constrained('government_agencies')->cascadeOnDelete();
            $table->enum('report_type', ['system', 'agency', 'complaint_statistics']);
            $table->enum('statistic_type',
                ['count_of_users', 'count_of_complaints', 'count_of_rejected_complaints', 'count_of_resolved_complaints']);
            $table->date('date');
            $table->decimal('value', 10, 2);
            $table->text('metadata')->nullable()->comment('بيانات إضافية (JSON)');
            $table->foreignId('generated_by')->nullable()
                ->comment('الشخص الذي أنشأ التقرير')
                ->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
