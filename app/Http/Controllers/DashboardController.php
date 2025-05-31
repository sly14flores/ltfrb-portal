<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $user;
    private $application;

    public function __construct(User $user, Application $application)
    {
        $this->user = $user;
        $this->application = $application;
    }

    public function index()
    {
        $applications = $this->getApplicationCount();

        $user = $this->user->findOrFail(Auth::user()->id);

        $all_users = $this->showAllUsers();
    
        $admin = User::ADMIN_ROLE_ID;
        $tech = User::TECH_ROLE_ID;
        $record = User::RECORDS_ROLE_ID;
        $client = User::CLIENT_ROLE_ID;

        

        return view('users.dashboard')->with('user', $user)
                                ->with('admin', $admin)
                                ->with('tech', $tech)
                                ->with('record', $record)
                                ->with('client', $client)
                                ->with('applications', $applications)
                                ->with('all_users', $all_users);

    }

    public function getApplicationCount()
    {
        $all_applications = $this->application->all();
        
        return $all_applications;
    }

    private function showAllUsers()
    {
        $all_users = $this->user->latest()->get();

        return $all_users;
    }
}
