<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Report;
use Carbon\Carbon;

class ReportController extends Controller
{
    private $report;
    public function __construct(Report $report)
    {
        $this->report = $report;
    }
    public function index()
    {
        $userApp = DB::table('users')
                    ->join('applications', 'users.id', '=', 'applications.user_id')
                    ->select('users.first_name', 'users.last_name', 'applications.app_number', 
                            'applications.status','applications.created_at')
                    ->get();
       // return view('admin.report.index');
        return view('admin.report.index', compact('userApp'));
    
    }
    public function show(Request $request)
    {
        $filter = $request->query('filter', 'all');

        switch ($filter) {
            case 'weekly':
                $userApp = DB::table('users')
                            ->join('applications', 'users.id', '=', 'applications.user_id')
                            ->select('users.first_name', 'users.last_name', 'applications.app_number', 
                                    'applications.status','applications.created_at')
                            ->where('applications.created_at', '>=', Carbon::now()->subWeek())
                            ->get();
                break;
            case 'monthly':
                $userApp = DB::table('users')
                            ->join('applications', 'users.id', '=', 'applications.user_id')
                            ->select('users.first_name', 'users.last_name', 'applications.app_number', 
                                    'applications.status','applications.created_at')
                            ->where('applications.created_at', '>=', Carbon::now()->subMonth())
                            ->get();
                break;
            case 'all':
            default:
            $userApp = DB::table('users')
                        ->join('applications', 'users.id', '=', 'applications.user_id')
                        ->select('users.first_name', 'users.last_name', 'applications.app_number', 
                                'applications.status','applications.created_at')
                        ->get();
                break;
        }

        return view('admin.report.index', compact('userApp'));
    }

    public function destroy(Report $report)
    {
        //
    }
}
