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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            // $table->unsignedBigInteger('plot_id');
            $table->foreignId('plot_id')->constrained()->onDelete('cascade');
            $table->string('description');
            $table->datetime('limit_date')->nullable();
            $table->timestamp('completed_date')->nullable();
            // $table->unsignedBigInteger('completed_by')->nullable();
            $table->foreignId('completed_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('status')->default('unrealized');
            $table->boolean('is_periodic')->default(false);
            $table->integer('time_period')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
