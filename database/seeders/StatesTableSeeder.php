<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $states = [
            ['id' => 1, 'name' => 'Abia'],
            ['id' => 2, 'name' => 'Adamawa'],
            ['id' => 3, 'name' => 'Akwa Ibom'],
            ['id' => 4, 'name' => 'Anambra'],
            ['id' => 5, 'name' => 'Bauchi'],
            ['id' => 6, 'name' => 'Bayelsa'],
            ['id' => 7, 'name' => 'Benue'],
            ['id' => 8, 'name' => 'Borno'],
            ['id' => 9, 'name' => 'Cross River'],
            ['id' => 10, 'name' => 'Delta'],
            ['id' => 11, 'name' => 'Ebonyi'],
            ['id' => 12, 'name' => 'Edo'],
            ['id' => 13, 'name' => 'Ekiti'],
            ['id' => 14, 'name' => 'Enugu'],
            ['id' => 15, 'name' => 'FCT'],
            ['id' => 16, 'name' => 'Gombe'],
            ['id' => 17, 'name' => 'Imo'],
            ['id' => 18, 'name' => 'Jigawa'],
            ['id' => 19, 'name' => 'Kaduna'],
            ['id' => 20, 'name' => 'Kano'],
            ['id' => 21, 'name' => 'Katsina'],
            ['id' => 22, 'name' => 'Kebbi'],
            ['id' => 23, 'name' => 'Kogi'],
            ['id' => 24, 'name' => 'Kwara'],
            ['id' => 25, 'name' => 'Lagos'],
            ['id' => 26, 'name' => 'Nasarawa'],
            ['id' => 27, 'name' => 'Niger'],
            ['id' => 28, 'name' => 'Ogun'],
            ['id' => 29, 'name' => 'Ondo'],
            ['id' => 30, 'name' => 'Osun'],
            ['id' => 31, 'name' => 'Oyo'],
            ['id' => 32, 'name' => 'Plateau'],
            ['id' => 33, 'name' => 'Rivers'],
            ['id' => 34, 'name' => 'Sokoto'],
            ['id' => 35, 'name' => 'Taraba'],
            ['id' => 36, 'name' => 'Yobe'],
            ['id' => 37, 'name' => 'Zamfara'],
        ];

        DB::table('states')->insert($states);
    }
}
