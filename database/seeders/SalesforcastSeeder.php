<?php

namespace Database\Seeders;

use App\Models\Salesforcast;
use Illuminate\Database\Seeder;

class SalesforcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salesforcast::factory()
            ->count(5)
            ->create();
    }
}
