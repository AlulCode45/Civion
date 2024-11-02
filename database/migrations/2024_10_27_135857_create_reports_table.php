<?php

use App\Enums\RiskLevelEnum;
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
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('report_user_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->enum('risk_level',[
                RiskLevelEnum::Low->value,
                RiskLevelEnum::Medium->value,
                RiskLevelEnum::High->value,
                RiskLevelEnum::Critical->value,
                RiskLevelEnum::NonPriority->value,
            ]);
            $table->char('province_id',2)->foreignId('province_id')->references('id')->on('provinces');
            $table->char('regency_id',4)->foreignId('regency_id')->references('id')->on('regencies');
            $table->char('district_id',6)->foreignId('district_id')->references('id')->on('districts');
            $table->char('village_id',10)->foreignId('village_id')->references('id')->on('villages');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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