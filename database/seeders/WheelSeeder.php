<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Car;
use App\Models\User;
use App\Models\Wheel;
use App\Models\NutBolt;
use App\Models\WheelType;
use App\Models\BoltPattern;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WheelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Wheel::insert([
            // [
            //     'id' => Str::uuid(), 'manufacturer_id' => Manufacturer::where('manufacturer_name', 'Unknown')->first()->id, 'model' => 'Unknown', 'price' => 0, 'wheel_type_id' => 1, 'diameter' => 0, 'width' => 0, 'ET_number' => 0,
            //     'bolt_pattern_id' => 1, 'kba_number' => 'KBA0', 'center_bore' => 0, 'nut_bolt_id' => 1, 'multipiece' => 0, 'photo' => 'wheel.png',
            //     'note' => 'Unknown', 'accepted' => 1
            // ],
            [
                'id' => Str::uuid(), 'manufacturer_id' =>  Manufacturer::where('manufacturer_name', 'ATS')->first()->id, 'model' => 'Cup', 'price' => 50000, 'wheel_type_id' => 9, 'diameter' => 15, 'width' => 7, 'ET_number' => 20,
                'bolt_pattern_id' => 10, 'kba_number' => 'KBA 48876', 'center_bore' => 57.1, 'nut_bolt_id' => 2, 'multipiece' => 0, 'photo' => 'ats_cup.png',
                'note' => 'ATU CUP 15 wheel', 'accepted' => 1, 'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => Str::uuid(), 'manufacturer_id' =>  Manufacturer::where('manufacturer_name', 'ATS')->first()->id, 'model' => 'Classic', 'price' => 150000, 'wheel_type_id' => 9, 'diameter' => 13, 'width' => 8, 'ET_number' => 1,
                'bolt_pattern_id' => 10, 'kba_number' => 'KBA 40078', 'center_bore' => 57.1, 'nut_bolt_id' => 2, 'multipiece' => 0, 'photo' => 'ats_classic.png',
                'note' => 'ATU CLASSIC 13 wheel', 'accepted' => 1, 'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'id' => Str::uuid(), 'manufacturer_id' =>  Manufacturer::where('manufacturer_name', 'ATS')->first()->id, 'model' => 'Papperpot', 'price' => 100000, 'wheel_type_id' => 9, 'diameter' => 13, 'width' => 6, 'ET_number' => 13,
                'bolt_pattern_id' => 10, 'kba_number' => 'KBA 40361', 'center_bore' => 57.1, 'nut_bolt_id' => 2, 'multipiece' => 0, 'photo' => 'ats_papperpot.jpg',
                'note' => 'ATU CLASSIC 13 wheel', 'accepted' => 1, 'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
