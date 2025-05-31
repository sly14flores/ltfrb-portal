<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class CreateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->info("Creating roles");

        $role = new Role;
        $role->name = "admin";
        $role->save();

        $role = new Role;
        $role->name = "staff";
        $role->save();
        
        $role = new Role;
        $role->name = "records";
        $role->save();

        $role = new Role;
        $role->name = "technical";
        $role->save();

        $role = new Role;
        $role->name = "client";
        $role->save();

        $this->info("Roles created");
        
    }
}
