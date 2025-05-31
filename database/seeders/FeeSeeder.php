<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fee;

class FeeSeeder extends Seeder
{
    private $fee;

    public function __construct(Fee $fee)
    {
        $this->fee = $fee;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fees = [
            [
                'name' => 'Certification',
                'amount' => 60
            ],
            [
                'name' => 'Sticker/Confirmation',
                'amount' => 100
            ],
            [
                'name' => 'Franchise Verification',
                'amount' => 50
            ],
            [
                'name' => 'Supv. Fee (Prev)',
                'amount' => 300
            ],
            [
                'name' => 'Supv. Fee (Current)',
                'amount' => 300
            ],
            [
                'name' => 'Fines(ITR)',
                'amount' => 100
            ]
            
            ];

        $this->fee->insert($fees);
    }
}
