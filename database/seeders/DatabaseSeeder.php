<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Item;
use App\Models\ItemBrand;
use App\Models\ItemType;
use App\Models\Outcome;
use App\Models\Income;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        function getBrand($str){
            return ItemBrand::where('name', '=', $str)->first()->id;
        }
        function getType($str){
            return ItemType::where('name', '=', $str)->first()->id;
        }
        function getUserEmail($str){
            return User::where('email', '=', $str)->first()->id;
        }
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mohammad Arief Darmawan',
            'email' => 'arief.d2202@gmail.com',
            'username' => 'arief',
            'password' => Hash::make('password'),
            'darkMode' => 1,
            'role' => 0
        ]);
        User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'username' => 'superadmin',
            'password' => Hash::make('password'),
            'role' => 0
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => null,
            'password' => Hash::make('password'),
            'role' => 1
        ]);

        
        Income::insert([
            ['item_id' => '15', 'user_id' => getUserEmail('arief.d2202@gmail.com'), 'count' => 3,'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);

        ItemBrand::insert([
            ['name' => 'Federal Kabel', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Belden', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Fuji Electric', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Schneider', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Omron', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Mitsubishi', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Moxa', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Kasuga', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Aerodev', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
        ItemType::insert([
            ['name' => 'Kabel', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Kabel Lan', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'NFB', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'MCB', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Power Supply', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Hub Switch', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Inverter', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'AC Servo Driver', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'IPC', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Noise Filter', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'HMI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Terminal Block', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'Smart Controller', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
        
        Item::insert([
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Merah', 'product_code' => '1 X 0,75'],
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Hitam', 'product_code' => '1 X 0,75'],
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Kuning', 'product_code' => '1 X 0,75'],
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Merah', 'product_code' => '1 X 0,5'],
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Hitam', 'product_code' => '1 X 0,5'],
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Kuning', 'product_code' => '1 X 0,5'],
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Kuning', 'product_code' => '1 X 0,5'],
            ['item_type_id' => getType('Kabel'), 'item_brand_id' => getBrand('Federal Kabel'), 'varian' => 'Kuning', 'product_code' => '1 X 0,5'],
            ['item_type_id' => getType('Kabel Lan'), 'item_brand_id' => getBrand('Belden'), 'varian' => 'Indoor', 'product_code' => 'CAT6'],
            ['item_type_id' => getType('NFB'), 'item_brand_id' => getBrand('Fuji Electric'), 'varian' => '75A', 'product_code' => 'BW100EAG-3P075'],
            ['item_type_id' => getType('MCB'), 'item_brand_id' => getBrand('Schneider'), 'varian' => '6A', 'product_code' => 'C6IC60N-2P'],
            ['item_type_id' => getType('Power Supply'), 'item_brand_id' => getBrand('Omron'), 'varian' => '10A', 'product_code' => 'S8VK-G24024'],
            ['item_type_id' => getType('Power Supply'), 'item_brand_id' => getBrand('Omron'), 'varian' => '5A', 'product_code' => 'S8VK-G12024'],
            ['item_type_id' => getType('Hub Switch'), 'item_brand_id' => getBrand('Moxa'), 'varian' => '8 Port', 'product_code' => 'EDS-G308'],
            ['item_type_id' => getType('Inverter'), 'item_brand_id' => getBrand('Mitsubishi'), 'varian' => '0,75k', 'product_code' => 'FR-D720S'],
            ['item_type_id' => getType('AC Servo Driver'), 'item_brand_id' => getBrand('Omron'), 'varian' => '400W', 'product_code' => 'R88D-1SN 04H-ECT'],
            ['item_type_id' => getType('IPC'), 'item_brand_id' => getBrand('Omron'), 'varian' => '9 x 28 Cm', 'product_code' => 'AC1 152000'],
            ['item_type_id' => getType('Noise Filter'), 'item_brand_id' => getBrand('Aerodev'), 'varian' => '3A', 'product_code' => 'DNF05-H-3A'],
            ['item_type_id' => getType('HMI'), 'item_brand_id' => getBrand('Omron'), 'varian' => '12.1 in', 'product_code' => 'NA5-12W101B-V1'],
            ['item_type_id' => getType('Terminal Block'), 'item_brand_id' => getBrand('Kasuga'), 'varian' => '2 Pin', 'product_code' => 'TR30'],
            ['item_type_id' => getType('Terminal Block'), 'item_brand_id' => getBrand('Kasuga'), 'varian' => '2 Pin', 'product_code' => 'TR60'],
            ['item_type_id' => getType('Smart Controller'), 'item_brand_id' => getBrand('Omron'), 'varian' => '200A', 'product_code' => 'Smart Controller EX'],
        ]);
    }

}
