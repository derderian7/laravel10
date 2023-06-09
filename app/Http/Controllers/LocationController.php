<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Database\QueryException;

class LocationController extends Controller
{

    // display percentage of specifics locations in all posts


public function percentage_of_locations()
{
    try {
        $locations = [
            "Aleppo",
            "Damascus",
            "Hama",
            "Tartus",
            "Latakia",
            "Idlib",
            "Homs",
            "Deir Ez-Zor",
            "Daraa",
            "As-Suwayda",
            "Raqqa",
            "Quneitra",
            "Al-Hasakah",
            "Rif Dimashq"
        ]; 

        $result = [];
        $totalPosts = Post::count();

        if ($totalPosts == 0) {
            throw new Exception('No posts found.');
        }

        foreach ($locations as $location) {
            $locationPosts = Post::where('location', $location)->count();
            $percentage = ($locationPosts / $totalPosts);
              $roundedPercentage = round($percentage * 100, 2);

            $result[$location] = $roundedPercentage;
        }

        return response()->json([
            'status' => 'success',
            'data' => $result,
        ]);
    } catch(QueryException $e) {
        return response()->json($e, 500);
    } catch(Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



};
