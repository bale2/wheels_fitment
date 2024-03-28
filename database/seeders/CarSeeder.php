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
            ],
            [
                'id' => Str::uuid(), 'manufacturer_id' => Manufacturer::where('manufacturer_name', 'Volkswagen')->first()->id, 'car_model' => 'Golf MK2',
                'engine_size' => 1300, 'car_year' => 1983, 'center_bore' => 57.1, 'nut_bolt_id' => NutBolt::where('type', 'Lug Bolt (M12x1.25)')->first()->id,
                'mtsurface_fender_distance' => 350, 'bolt_pattern_id' => BoltPattern::where('bolt_pattern', '4x100')->first()->id, 'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => Str::uuid(), 'manufacturer_id' => Manufacturer::where('manufacturer_name', 'Volkswagen')->first()->id, 'car_model' => 'Golf MK3',
                'engine_size' => 1400, 'car_year' => 1993, 'center_bore' => 57.1, 'nut_bolt_id' => NutBolt::where('type', 'Lug Bolt (M12x1.25)')->first()->id,
                'mtsurface_fender_distance' => 350, 'bolt_pattern_id' => BoltPattern::where('bolt_pattern', '4x100')->first()->id, 'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => Str::uuid(), 'manufacturer_id' => Manufacturer::where('manufacturer_name', 'Nissan')->first()->id, 'car_model' => 'Almera (n15)',
                'engine_size' => 1400, 'car_year' => 1995, 'center_bore' => 59.1, 'nut_bolt_id' => NutBolt::where('type', 'Lug Nut (12mm x 1.5)')->first()->id,
                'mtsurface_fender_distance' => 350, 'bolt_pattern_id' => BoltPattern::where('bolt_pattern', '4x100')->first()->id, 'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => Str::uuid(), 'manufacturer_id' => Manufacturer::where('manufacturer_name', 'Peugeot')->first()->id, 'car_model' => '206',
                'engine_size' => 1100, 'car_year' => 1998, 'center_bore' => 65, 'nut_bolt_id' => NutBolt::where('type', 'Lug Bolt (M12x1.25)')->first()->id,
                'mtsurface_fender_distance' => 350, 'bolt_pattern_id' => BoltPattern::where('bolt_pattern', '4x108')->first()->id, 'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
            //peugeot szúrd be gyártóként, opelt is!
            [
                'id' => Str::uuid(), 'manufacturer_id' => Manufacturer::where('manufacturer_name', 'Opel')->first()->id, 'car_model' => 'Vectra B',
                'engine_size' => 1600, 'car_year' => 1995, 'center_bore' => 56.5, 'nut_bolt_id' => NutBolt::where('type', 'Lug Bolt (M12x1.25)')->first()->id,
                'mtsurface_fender_distance' => 350, 'bolt_pattern_id' => BoltPattern::where('bolt_pattern', '4x100')->first()->id, 'accepted' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
