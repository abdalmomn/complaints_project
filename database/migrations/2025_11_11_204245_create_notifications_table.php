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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('user_id')->nullable()
                ->comment('المستخدم - null للإشعارات العامة')
                ->constrained('users')->nullOnDelete();
            $table->foreignId('sender_id')->nullable()
                ->comment('الشخص الذي أرسل التنبيه')
                ->constrained('users')->nullOnDelete();
            $table->string('title')->comment('عنوان الإشعار');
            $table->text('message')->comment('نص الإشعار');
            $table->enum('notification_type', ['info', 'success', 'warning', 'error', 'reminder'])
                ->default('info')->comment('نوع الإشعار');
            $table->morphs('notifiable');//id + type of model that related to the notification
            $table->timestamp('read_at')->nullable()->comment('تاريخ القراءة');
            $table->timestamp('scheduled_at')->nullable()->comment('موعد الإرسال');
            $table->timestamp('sent_at')->nullable()->comment('تاريخ الإرسال الفعلي');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
