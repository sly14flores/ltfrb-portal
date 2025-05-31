<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    private $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            [
                'name' => 'Dropping',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
            ];

        $this->type->insert($type);
    }
}
