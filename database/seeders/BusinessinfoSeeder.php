<?php

namespace Database\Seeders;

use App\Models\Businessinfo;
use Illuminate\Database\Seeder;

class BusinessinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Businessinfo::factory()
            ->count(5)
            ->create();
    }
}
