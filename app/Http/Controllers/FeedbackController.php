<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;
class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            
        ]);

        Feedback::create($validatedData);

        return response()->json(['message' => 'Feedback stored successfully']);
    }

    public function getRating($userId)
    {
        $rating = Feedback::where('user_id', $userId)->avg('rating');

        return response()->json(['rating' => $rating]);
    }
}
