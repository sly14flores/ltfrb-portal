<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Staff',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Records',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Technical',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Client',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
            ];

        $this->role->insert($roles);
    }
}
