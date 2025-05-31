<?php

namespace Database\Seeders;

use App\Models\Denomination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DenoSeeder extends Seeder
{
    private $deno;

    public function __construct(Denomination $deno)
    {
        $this->deno = $deno;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deno = [
            [
                'name' => 'Truck For Hire',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
            ];

        $this->deno->insert($deno);
    }
}
