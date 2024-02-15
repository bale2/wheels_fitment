<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@mail.com',
        //     'password' => 'password',
        // ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' =>Hash::make('password'),
            'is_admin' => 1
        ]);
        // DB::table('manufacturer')->insert([
        //     'manufacturer_name' => 'Ismeretlen',
        //     'only_wheel_maker' => 1
        // ]);
        // DB::table('nut_bolt')->insert([
        //     'type' => 'Ismeretlen'
        // ]);
        // DB::table('bolt_pattern')->insert([
        //     'bolt_pattern' => 'Ismeretlen'
        // ]);
        // DB::table('wheel_type')->insert([
        //     'wheel_type' => 'Ismeretlen'
        // ]);
        // DB::table('wheels')->insert([
        //     'manufacturer_id' => 1,
        //     'model' => 'ismeretlen',
        //     'price' => 0,
        //     'wheel_type_id' => 1,
        //     'diameter' => 0,
        //     'width' => 0,
        //     'ET_number' => 0,
        //     'bolt_pattern_id' => 1,
        //     'kba_number' => 'KBA0',
        //     'center_bore' => 0,
        //     'multipiece' => 0,
        //     'photo' => 'idk.jpg'

        // ]);
    }
}
