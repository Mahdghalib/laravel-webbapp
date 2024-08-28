<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use App\Models\Feedback;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //<?php






    public function dashboard()
    {
        // Fetch employee distribution data by department
        $employeeDistribution = Employe::selectRaw('departement as department, COUNT(*) as count')
            ->groupBy('departement')
            ->pluck('count', 'department')->toArray();

        // Fetch feedback trends over time
        $feedbackTrends = Feedback::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date')->toArray();

        // Pass data to the view
        return view('admin.dashboard', [
            'employeeDistribution' => [
                'labels' => array_keys($employeeDistribution),
                'data' => array_values($employeeDistribution),
            ],
            'feedbackTrends' => [
                'labels' => array_keys($feedbackTrends),
                'data' => array_values($feedbackTrends),
            ],
        ]);
    }
}

