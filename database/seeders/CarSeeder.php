<?php

namespace Database\Seeders;


use App\Models\Car;
use App\Models\NutBolt;
use App\Models\BoltPattern;
use Illuminate\Support\Str;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;
use SebastianBergmann\Type\NullType;
use PHPUnit\Framework\MockObject\Builder\Identity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::insert([
            [
                'id' => Str::uuid(), 'manufacturer_id' => Manufacturer::where('manufacturer_name', 'Volkswagen')->first()->id, 'car_model' => 'Golf MK1',
                'engine_size' => 1100, 'car_year' => 1974, 'center_bore' => 57.1, 'nut_bolt_id' => NutBolt::where('type', 'Lug Bolt (M12x1.25)')->first()->id,
                'mtsurface_fender_distance' => 350, 'bolt_pattern_id' => BoltPattern::where('bolt_pattern', '4x100')->first()->id, 'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
