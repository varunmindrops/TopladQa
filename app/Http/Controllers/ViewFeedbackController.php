<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class ViewFeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::where('status', 1)->whereNull('deleted_at')->get();
    
        return view('site.view-feedback', compact('feedback'));
    }
}
