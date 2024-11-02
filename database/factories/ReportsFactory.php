<?php

namespace Database\Factories;

use App\Enums\RiskLevelEnum;
use App\Models\Category;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports>
 */
class ReportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { // Pilih province_id terlebih dahulu
        $province = Province::firstOrFail(); // atau Province::factory()->create() untuk testing jika tidak ada data

        // Pilih regency_id berdasarkan province_id yang dipilih
        $regency = $province->regencies()->firstOrFail(); // Sesuaikan nama relasi `regencies`

        // Pilih district_id berdasarkan regency_id yang dipilih
        $district = $regency->districts()->firstOrFail(); // Sesuaikan nama relasi `districts`

        // Pilih village_id berdasarkan district_id yang dipilih
        $village = $district->villages()->firstOrFail(); // Sesuaikan nama relasi `villages`

        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'report_user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'risk_level' => $this->faker->randomElement([
                RiskLevelEnum::Low->value,
                RiskLevelEnum::Medium->value,
                RiskLevelEnum::High->value,
                RiskLevelEnum::Critical->value,
                RiskLevelEnum::NonPriority->value,
            ]),
            'province_id' => $province->id,
            'regency_id' => $regency->id,
            'district_id' => $district->id,
            'village_id' => $village->id,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}