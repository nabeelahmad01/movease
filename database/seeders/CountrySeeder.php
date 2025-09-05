<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('countries')->updateOrInsert(
            ['iso2' => 'US'],
            ['name' => 'United States', 'iso3' => 'USA']
        );
    }
}
