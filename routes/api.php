<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth Controller

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('login_admin', 'login_admin');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});
////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////

Route::group(['middleware' => ['auth']], function () {

// Admin Controller 
  Route::get('showAllUsersProfile',[AdminController::class,'showAllUsersProfile']);
  Route::get('GetAdmin',[AdminController::class,'GetAdmin']);
  Route::get('NewUsers',[AdminController::class,'NewUsers']);
  Route::get('CountAllUsers',[AdminController::class,'CountAllUsers']);
  Route::get('getadminprofile',[AdminController::class,'getadminprofile']);


  // User Controller
  Route::post('updateUserProfile',[UserController::class,'updateUserProfile']);
  Route::delete('destroy/{id}',[UserController::class,'destroy']);
  Route::get('getmyprofile',[UserController::class,'getmyprofile']);
  Route::get('getuserprofile/{id}',[UserController::class,'getuserprofile']);


// Post Controller
Route::resource('posts',PostController::class);


// Image Controller
Route::post('updateProfileImage', [imageController::class, 'updateProfileImage']);
Route::delete('deleteImage/{id}', [imageController::class, 'deleteImage']);



<<<<<<< HEAD
=======
// Report Controller

>>>>>>> 05c499fd1b0760a8ac3e9f4b81709b9dbe9b6559


// Feedback Controller
Route::post('feedback', [FeedbackController::class, 'store']);
Route::get('rating/{userId}', [FeedbackController::class, 'getRating']);
Route::get('getMyRating', [FeedbackController::class, 'getMyRating']);

//Wishlist Controller
Route::post('addToWishlist/{post_id}', [WishlistController::class,'addToWishlist']);
Route::get('getWishlist', [WishlistController::class,'index']);

//Report Controller
Route::get('show_report', [ReportController::class, 'index']);
Route::post('report', [ReportController::class, 'store']);
Route::get('report_count', [ReportController::class, 'CountReport']);
<<<<<<< HEAD

=======
Route::post('report/{id}', [ReportController::class, 'store']);
>>>>>>> 05c499fd1b0760a8ac3e9f4b81709b9dbe9b6559

//Location Controller
Route::get('percentage_of_locations', [LocationController::class, 'percentage_of_locations']);
Route::get('Count_of_locations', [LocationController::class, 'Count_of_locations']);


//Category Controller
Route::get('percentage_of_categories', [CategoryController::class, 'percentage_of_categories']);
Route::get('CountAllCategories', [CategoryController::class, 'CountAllCategories']);

//Message Controller
Route::get('CountMsg', [MessageController::class, 'CountMsg']);
Route::post('messages', [MessageController::class, 'store']);

});
