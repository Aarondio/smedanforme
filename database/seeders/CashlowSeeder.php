<?php

namespace Database\Seeders;

use App\Models\Cashlow;
use Illuminate\Database\Seeder;

class CashlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cashlow::factory()
            ->count(5)
            ->create();
    }
}
