<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

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

        $this->info("Creating admin account");

        $password = "12345678";

        $admin = new User;
        $admin->first_name = "LTFRB";
        $admin->last_name = "ADMIN";
        $admin->role_id = 1;
        $admin->email = "admin@ltfrb.online";
        $admin->password = Hash::make($password);

        $admin->save();

        $this->info("Admin account created");

    }
}
