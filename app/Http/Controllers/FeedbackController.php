<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        // Only allow admins to see feedback
        if (Auth::user()->is_admin) {
            $feedbacks = Feedback::all();
            return view('feedback.index', compact('feedbacks'));
        }
        return redirect('/home');
    }
        
    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'feedback' => $request->feedback,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
    
}
