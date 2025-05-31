<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Denomination;
use App\Models\Type;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    private $client;
    private $type;
    private $denomination;
    private $user;
    private $application;

    public function __construct(Client $client, Type $type, Denomination $denomination, User $user, Application $application)
    {
        $this->client = $client;
        $this->type = $type;
        $this->denomination = $denomination;
        $this->user = $user;
        $this->application = $application;
    }

    public function index()
    {
        return view('users.clients.index');
    }

    public function create()
    {
        // $client = $this->client->findOrFail($id);
        $all_denominations = $this->denomination->all();
        $all_types = $this->type->all();
        
        return view('users.clients.create')
                ->with('all_denominations', $all_denominations)
                ->with('all_types', $all_types);
    }

    
    public function show()
    {
        $user = $this->user->find(Auth::user()->id);

        return view('users.clients.show')->with('user', $user);
    }

    public function showFees($id)
    {
        $application = $this->application->findOrFail($id);
        $total = $this->showTotalFees($id);

        return view('users.clients.fees')->with('application', $application)
                        ->with('total', $total);
    }

    private function showTotalFees($id)
    {
        $application = $this->application->findOrFail($id);

        $total = 0;
        foreach($application->applicationFees as $application_fee){
            $total += $application_fee->fee->amount;
        }

        $surcharges = $application->surcharges;
        $late_confirmation = $application->late_confirmation;
        $penalties = $application->penalties;
        $others = $application->others;

        $total_other_fees = $surcharges + $late_confirmation + $penalties + $others;
        
        $final_total = $total_other_fees + $total;
        return $final_total;
    }
}

