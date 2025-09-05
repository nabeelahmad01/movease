<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopMoverSeeder extends Seeder
{
    public function run(): void
    {
        // Get some company IDs
        $companyIds = DB::table('companies')->pluck('id')->toArray();
        
        if (empty($companyIds)) {
            return;
        }

        $topMovers = [
            [
                'company_id' => $companyIds[0] ?? 1,
                'page' => 'California',
                'heading' => 'Best California Movers',
                'phone' => '(555) 123-4567',
                'position' => 1,
                'point_one' => 'Licensed & Insured',
                'point_two' => 'Free Estimates',
                'point_three' => '24/7 Support',
                'status' => 'active',
                'expires_at' => now()->addMonths(6)
            ],
            [
                'company_id' => $companyIds[1] ?? 1,
                'page' => 'Texas',
                'heading' => 'Top Texas Moving Company',
                'phone' => '(555) 234-5678',
                'position' => 1,
                'point_one' => 'Professional Team',
                'point_two' => 'Competitive Pricing',
                'point_three' => 'On-Time Delivery',
                'status' => 'active',
                'expires_at' => now()->addMonths(6)
            ],
            [
                'company_id' => $companyIds[2] ?? 1,
                'page' => 'Florida',
                'heading' => 'Florida Moving Experts',
                'phone' => '(555) 345-6789',
                'position' => 1,
                'point_one' => 'Full Service Moving',
                'point_two' => 'Packing Services',
                'point_three' => 'Storage Solutions',
                'status' => 'active',
                'expires_at' => now()->addMonths(6)
            ]
        ];

        foreach ($topMovers as $mover) {
            DB::table('top_movers')->updateOrInsert(
                ['company_id' => $mover['company_id'], 'page' => $mover['page']],
                $mover
            );
        }
    }
}
