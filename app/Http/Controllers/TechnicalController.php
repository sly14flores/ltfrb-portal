<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ApplicationFee;
use App\Models\Fee;

class TechnicalController extends Controller
{
    private $application;
    private $fees;
    private $application_fee;

    public function __construct(Application $application, Fee $fees, ApplicationFee $application_fee)
    {
        $this->application = $application;
        $this->fees = $fees;
        $this->application_fee = $application_fee;
    }

    public function show()
    {
        $all_applications = $this->application->all();
        $all_fees = $this->fees->all();

        return view('users.technical.show')->with('all_applications', $all_applications)
                            ->with('all_fees', $all_fees);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'nullable|array',
            'remarks' => 'nullable|array', // Allow remarks to be optional
            'status.*' => 'in:1,2', // Ensure status is either 1 (Verified) or 2 (Pending)
            'remarks.*' => 'string|nullable|max:500', // Ensure remarks are strings with a maximum length
        ]);


        foreach ($request->status as $applicationId => $status) {
            // Find the application by its ID
            $application = $this->application->findOrFail($applicationId);
    
            // Update status and remarks (if any)
            $application->status = $status;
            if (isset($request->remarks[$applicationId])) {
                $application->remarks = $request->remarks[$applicationId];
            }
    
            // Save the application
            $application->save();
        }

        return back();
    }

    public function saveFees(Request $request)
    {
        $request->validate([
            'app_id' => 'required|exists:applications,id', // Ensure valid application ID
            'fees' => 'nullable|array',                  // Optional pre-defined fees
            'surcharges' => 'nullable|numeric',
            'late_confirmation' => 'nullable|numeric',
            'penalties' => 'nullable|numeric',
            'others' => 'nullable|numeric'
        ]);
        
        $application = $this->application->findOrFail($request->app_id);

        $application_fee = [];

        // for checkbox fees
        if ($request->filled('fees')) {
            foreach ($request->fees as $fee_id) {
                $application_fee[] = [
                    'fee_id' => $fee_id,
                    'application_id' => $request->app_id
                ];
            }
            $application->applicationFees()->createMany($application_fee);
        }
        // for textbox fees
        $application->surcharges = $request->surcharges;
        $application->late_confirmation = $request->late_confirmation;
        $application->penalties = $request->penalties;
        $application->others = $request->others;
        $application->save();

     
        return redirect()->route('technical.showfees', $request->app_id);
    }

    public function fees($id)
    {
        $all_fees = $this->fees->all();

        $application = $this->application->findOrFail($id);

        return view('users.technical.payfees')->with('application', $application)
                                ->with('all_fees', $all_fees);
    }

    public function showFees($id)
    {
        $application = $this->application->findOrFail($id);

        $total_fees = $this->showTotalFees($id);

        return view('users.technical.showfees')->with('application', $application)
                                        ->with('total_fees', $total_fees);
    }


    public function deleteFees(Request $request, $app_id)
    {

        $fee_id = $request->fee_id;

        $this->application_fee->where('application_id', $app_id)
                    ->where('fee_id',$fee_id)->delete();

        return redirect()->back();
    }

    public function deleteSurcharges($id)
    {
        $application = $this->application->findOrFail($id);

        $application->surcharges = null;

        $application->save();

        return back();
    }

    public function deleteLateConfirmation($id)
    {
        $application = $this->application->findOrFail($id);

        $application->late_confirmation = null;

        $application->save();

        return back();
    }

    public function deletePenalties($id)
    {
        $application = $this->application->findOrFail($id);

        $application->penalties = null;

        $application->save();

        return back();
    }

    public function deleteOthers($id)
    {
        $application = $this->application->findOrFail($id);

        $application->others = null;

        $application->save();

        return back();
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
