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
        \App\Models\User::factory(10)->create();

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

        //Manufacturers cars
        $manufacturers=["Toyota","Ford","Honda","Chevrolet","BMW","Volkswagen","Nissan","Mercedes-Benz","Audi","Hyundai","Subaru","Kia","Tesla","Fiat","Jaguar","Land Rover","Volvo","Porsche","Mazda","Buick","GMC","Cadillac","Lexus","Infiniti","Acura","Chrysler","Dodge","Jeep","Ram","Mitsubishi","Alfa Romeo","Ferrari","Lamborghini","Maserati","Aston Martin","Bentley","Rolls-Royce","Mini","Bugatti","Genesis","Lotus","McLaren","Smart","Suzuki","Fisker","Hennessey","Karma","Lucid","Rivian","Polestar"];
        foreach ($manufacturers as $manufacturer){
            DB::table('manufacturers')->insert([
                'manufacturer_name'=>$manufacturer,
                'only_wheel_maker' => false
            ]);
        }
        //Manufacturers wheels
        $manufacturers2=["BBS","3SDM","RADI8","Ronal","Enkei","Vossen","Rotiform","OZ Racing","Forgestar","ADV.1","HRE","American Racing","Konig","Work Wheels","Volk Racing","Fifteen52","SSR","TSW","Momo","Hartge"];
        foreach ($manufacturers2 as $manufacturer){
            DB::table('manufacturers')->insert([
                'manufacturer_name'=>$manufacturer,
                'only_wheel_maker' => true
            ]);
        }

        // Nuts or Bolts
        $nutsBolts = ["Lug Bolt (M12x1.25)","Lug Nut (12mm x 1.5)","Wheel Stud (M14x1.75)","Acorn Lug Nut (1/2-20)","Spline Drive Lug Bolt (M12x1.5)","Mag Seat Lug Nut (M12x1.25)","Extended Thread Lug Bolt (M14x1.5)","Conical Seat Lug Nut (14mm x 2.0)","Collared Lug Bolt (1/2-20)","Closed End Lug Nut (M12x1.25)"];
        foreach($nutsBolts as $nutBolt){
            DB::table('nut_bolts')->insert([
                'type'=>$nutBolt
            ]);
        }

        //Bolt Patterns
        $boltPatterns = [
            "3x100", "3x105", "3x112.5", "3x115", "3x120", "3x125", "3x150", "3x98",
            "4x100", "4x101.6", "4x108", "4x110", "4x114", "4x114.3", "4x115", "4x120", "4x130", "4x140", "4x150", "4x160", "4x170", "4x190", "4x95.25", "4x98",
            "5x100", "5x105", "5x106", "5x108", "5x110", "5x112", "5x114", "5x114.3", "5x115", "5x118", "5x120", "5x120.65", "5x127", "5x128", "5x130", "5x135", "5x139.7", "5x140", "5x150", "5x152.4", "5x154.94", "5x160", "5x165.1", "5x170", "5x190", "5x205", "5x98",
            "6x114.3", "6x115", "6x120", "6x125", "6x127", "6x130", "6x132", "6x135", "6x139.43", "6x139.7", "6x170", "6x180", "6x200", "6x205", "6x222.2",
            "7x150",
            "8x165.1", "8x170", "8x180", "8x200", "8x210", "8x225", "8x275",
            "10x225"
        ];
        foreach ($boltPatterns as $boltPattern){
            DB::table('bolt_patterns')->insert([
                'bolt_pattern'=>$boltPattern
            ]);
        }
        //wheel types
        $wheel_types=["Street", "Offroad", "Show", "Truck", "SUV", "Performance", "Custom", "Classic", "Luxury", "Track"];
        foreach ($wheel_types as $wheel_type){
            DB::table('wheel_types')->insert([
                'wheel_type'=>$wheel_type
            ]);
        }

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
