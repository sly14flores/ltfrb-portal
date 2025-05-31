<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Requirement;

class RequirementSeeder extends Seeder
{
    private $requirement;

    public function __construct(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requirement = [
            [
                'name' => 'OR/CR',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Yellow Plate Number',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Petition for Dropping',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
            ];

        $this->requirement->insert($requirement);
    }
}
