<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Settlement;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Settlement::truncate();

        $csvFile = fopen(base_path("public/magyartelepules1.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 3200, ",")) !== FALSE) {
            if (!$firstline) {
                Settlement::create([
                    "name" => $data['0']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
