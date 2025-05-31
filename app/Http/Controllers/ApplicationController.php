<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Denomination;
use App\Models\Type;
use App\Models\Application;
use App\Models\User;
use App\Models\SubmittedRequirement;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    private $application;
    private $type;
    private $denomination;
    private $submitted_requirements;
    private $generate_numbers = [];
    private $user;

    public function __construct(Application $application, Type $type, Denomination $denomination, SubmittedRequirement $submitted_requirements, User $user)
    {
        $this->application = $application;
        $this->type = $type;
        $this->denomination = $denomination;
        $this->submitted_requirements = $submitted_requirements;
        $this->user = $user;
    }

    public function store(Request $request)
    {
        $request->validate([
            'app_type' => 'required',
            'denomination' => 'required',
            'case_no' => 'required',
            'chassis_no' => 'required',
            'motor_no' => 'required',
            'plate_number' => 'required',
            // 'requirements' => 'required|max:5120'
        ]);

        $this->application->app_number = $this->generateNumber();
        $this->application->type_id = $request->app_type;
        $this->application->deno_id = $request->denomination;
        $this->application->user_id = Auth::user()->id;
        $this->application->case_number = $request->case_no;
        $this->application->chassis_number = $request->chassis_no;
        $this->application->motor_number = $request->motor_no;
        $this->application->plate_number = $request->plate_number;
        // $this->application->requirements = $request->requirements; to follow

        $this->application->save();

        return redirect()->route('dashboard.index');
    }

   private function generateNumber(){
        do{
            $random_numbers = random_int(100000, 999999);
        }
        while(in_array($random_numbers, $this->generate_numbers));

        $this->generate_numbers[] = $random_numbers;

        $formatted_number = substr($random_numbers, 0 ,3) . '-' . substr($random_numbers, 3, 3);

        return $formatted_number;
   }

   
}
