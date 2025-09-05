<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $stateIds = DB::table('states')->pluck('id')->all();
        if (empty($stateIds)) { return; }
        for ($i=1; $i<=20; $i++) {
            $name = 'Test Movers '.Str::upper(Str::random(4));
            DB::table('companies')->insert([
                'name' => $name,
                'slug' => Str::slug($name).'-'.Str::random(5),
                'email' => 'company'.$i.'@example.com',
                'phone' => '(555) 000-'.str_pad((string)$i,4,'0',STR_PAD_LEFT),
                'address_line1' => rand(100,999).' Main St',
                'city' => 'City '.rand(1,50),
                'state_id' => $stateIds[array_rand($stateIds)],
                'zip' => (string)rand(10000,99999),
                'description' => 'Sample company for testing.',
                'status' => 'active',
                'service_type' => rand(0,1) ? 'local' : 'long_distance',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
