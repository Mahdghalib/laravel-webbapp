<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class ClientFeedbackController extends Controller
{
    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'quality_rating' => 'required|integer|min:1|max:5',
            'client' => 'required|string',
            // Assuming the rating is 1 to 5
            'time_of_treatment' => 'required|string|max:255',
            'comportment' => 'required|string|max:255',
            'comments' => 'nullable|string',
        ]);

        Feedback::create([
            'quality_rating' => $validatedData['quality_rating'],
            'client' => $validatedData['client'],
            
            'time_of_treatment' => $validatedData['time_of_treatment'],
            'comportment' => $validatedData['comportment'],
            'comments' => $validatedData['comments'],
        ]);

        return redirect()->route('feedback.create')->with('success', 'Thank you for your feedback!');
    }
}
