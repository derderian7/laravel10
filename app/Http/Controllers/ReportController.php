<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;

class ReportController extends controller{

// make a report to a post 

<<<<<<< HEAD

public function store($postId)
{
    try {
=======
    public function store(Request $request)
    {
        try{
>>>>>>> ab88397cb7746c4917726d9aeedff24d83551d69
        $report = Report::create([
            'post_id' => $postId,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Report stored successfully',
        ]);
    } catch(QueryException $e){
      return response()->json($e,500);}
    catch (\Exception $e) {
        return response()->json($e, 500);
    }
}


    //show all the reports 

    public function index()
    {
        try{
        $reports=Report::all();
        return response()->json([
            'status' => 'success',
            'data' => $reports,
        ]);
    }catch(QueryException $e){
        return response()->json($e,500);
      }catch(Exception $e){
        return response()->json($e,500);
      }
    }

// show all the posts with their reports 

    public function CountReport()
    {
      try{
        $posts = DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->leftJoin('reports', 'posts.id', '=', 'reports.post_id')
        ->select('posts.id', 'posts.title', 'users.name as user_name', DB::raw('count(reports.id) as report_count'))
        ->groupBy('posts.id', 'posts.title', 'users.name')
        ->get();
      
        $posts = $posts->toArray();

        return response()->json([
        'success' => true,
        'message' => 'Posts retrieved successfully!',
        'data' => $posts
        ], 200);
    }catch(QueryException $e){
     return response()->json($e,500);
     }catch(Exception $e){
    return response()->json($e,500);
  }
}
}