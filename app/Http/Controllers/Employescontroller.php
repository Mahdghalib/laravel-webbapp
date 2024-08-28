<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Feedback;
use Carbon\Carbon;

class Employescontroller extends Controller
{
  
    public function dashboard()
    {
        $employeeCount = Employe::count();
        $feedbackCount = Feedback::count();
        
        
        $feedbackTrends = $this->getFeedbackTrends(); 
        $qualityRatings = $this->getQualityRatings();
    
        return view('home', [
            'employeeCount' => $employeeCount,
            'feedbackCount' => $feedbackCount,
            'feedbackTrends' => $feedbackTrends,
            'qualityRatings' => $qualityRatings
        ]);
    }
    
    private function getFeedbackTrends()
    {
        // Group by day instead of month to get exact dates
        $feedbacks = Feedback::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                              ->groupBy('date')
                              ->orderBy('date')
                              ->get();
    
        $dates = $feedbacks->pluck('date'); // This will be an array of exact dates
        $counts = $feedbacks->pluck('count'); // This will be the counts corresponding to the dates
        
        return ['dates' => $dates, 'counts' => $counts];
    }
    
    
    private function getQualityRatings()
    {
        $totalFeedbacks = Feedback::count();
    
        if ($totalFeedbacks === 0) {
            return ['counts' => [0, 0, 0]]; 
        }
    
        $good = Feedback::where('quality_rating', 5)->count();
        $average = Feedback::where('quality_rating', 3)->count();
        $poor = Feedback::where('quality_rating', 1)->count();
    
        return [
            'counts' => [
                ($good / $totalFeedbacks) * 100,
                ($average / $totalFeedbacks) * 100,
                ($poor / $totalFeedbacks) * 100,
            ]
        ];
    }
    // Index method to list all employees
    public function index()
    {
        $employes = Employe::all();
        return view('employes.index', compact('employes'));
    }

    // Create method to display the form for adding a new employee
    public function create()
    {
        return view('employes.create');
    }

    // Store method to save the new employee to the database
    public function store(Request $request)
    {
        $this->validate($request, [
            'registration_number' => 'required|numeric|unique:employes,registration_number',
            'fullname' => 'required',
            'departement' => 'required',
            'hire_date' => 'required',
            'speciality' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
        ]);

        Employe::create($request->except('_token'));

        return redirect()->route('employes.index')->with('success', 'Employee added successfully');
    }

    // Edit method to display the form for editing an employee
    public function edit($id)
    {
        $employe = Employe::where('registration_number', $id)->first();
        return view('employes.edit', compact('employe'));
    }


    public function update(Request $request, $id)
    {
        $employe = Employe::where('registration_number', $id)->first();

        $this->validate($request, [
            'registration_number' => 'required|numeric|unique:employes,registration_number,' . $employe->id,
            'fullname' => 'required',
            'departement' => 'required',
            'hire_date' => 'required',
            'speciality' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
        ]);

        $employe->update($request->except('_token', '_method'));

        return redirect()->route('employes.index')->with('success', 'Employee updated successfully');
    }

    // Destroy method to delete an employee
    public function destroy($id)
    {
        $employe = Employe::where('registration_number', $id)->first();
        $employe->delete();

        return redirect()->route('employes.index')->with('success', 'Employee deleted successfully');
    }

    // Show method to display an employee's details
    public function show($id)
    {
        $employe = Employe::where('registration_number', $id)->first();
        return view('employes.show', compact('employe'));
    }

    // Vacation request method
    public function vacationRequest($id)
    {
        $employe = Employe::where('registration_number', $id)->first();
        return view('employes.vacation-request', compact('employe'));
    }

    // Certificate request method
    public function certificateRequest($id)
    {
        $employe = Employe::where('registration_number', $id)->first();
        return view('employes.certificate-request', compact('employe'));
    }

    // Store Contact method
    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Handle the form submission (e.g., send an email, store in the database)
        // ...

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
