<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HealerController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\HealerPlantRelationController;
use App\Http\Controllers\IndigenousKnowledgeController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;

Route::get('/', function () {
    $featuredPlants = \Illuminate\Support\Facades\Schema::hasTable('plants')
        ? \App\Models\Plant::limit(10)->get()
        : collect();
    return view('User.home', compact('featuredPlants'));
})->name('welcome');

// The User.home route should be publicly accessible (guest-first modal handled in the view)
Route::get('/home', [App\Http\Controllers\AuthController::class, 'home'])->name('User.home');

// Registration page route
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout route (optional)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Remove or comment out the closure route for /plants
// Route::get('/plants', function () {
//     return view('plants');
// })->name('plants');

// Add the correct route
Route::get('/plants', [PlantController::class, 'userIndex'])->name('plants');

Route::get('/plants/search', [PlantController::class, 'search'])->name('plants.search');

Route::get('/healers', [HealerController::class, 'publicIndex'])->name('healers')->middleware('auth');

Route::get('/healers/search', [HealerController::class, 'search'])->name('healers.search');

Route::get('/tutorials', [App\Http\Controllers\TutorialController::class, 'userIndex'])->name('tutorials');

Route::get('/about', function () {
    return view('User.about');
})->name('about');

Route::get('/privacy', function () {
    return view('User.privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('User.terms');
})->name('terms');

Route::get('/contact', function () {
    return view('User.contact');
})->name('contact');

Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'userForm'])->name('feedback');
Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.submit');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth');

Route::get('/admin/healers', [HealerController::class, 'index'])->middleware('auth');

Route::get('/admin/plants', [PlantController::class, 'index'])->middleware('auth');
Route::get('/admin/plants/{id}', [PlantController::class, 'show'])->middleware('auth');

Route::get('/admin/healer-plant-relations', [HealerPlantRelationController::class, 'index'])->middleware('auth');

Route::get('/admin/indigenous-knowledge', [IndigenousKnowledgeController::class, 'index'])->middleware('auth');

Route::get('/admin/tutorials', [TutorialController::class, 'index'])->middleware('auth');

Route::get('/admin/feedback', [FeedbackController::class, 'index'])->middleware('auth');

Route::get('/admin/users', [UserController::class, 'index'])->middleware('auth');

Route::post('/admin/healers', [HealerController::class, 'store'])->middleware('auth');
Route::post('/admin/plants', [PlantController::class, 'store'])->middleware('auth');
Route::post('/admin/healer-plant-relations', [HealerPlantRelationController::class, 'store'])->middleware('auth');
Route::post('/admin/indigenous-knowledge', [IndigenousKnowledgeController::class, 'store'])->middleware('auth');
Route::post('/admin/tutorials', [TutorialController::class, 'store'])->middleware('auth');
Route::post('/admin/feedback', [FeedbackController::class, 'store'])->middleware('auth');
Route::post('/admin/users', [UserController::class, 'store'])->middleware('auth');

Route::put('/admin/healers/{healer}', [HealerController::class, 'update'])->middleware('auth');
Route::delete('/admin/healers/{healer}', [HealerController::class, 'destroy'])->middleware('auth');

Route::put('/admin/plants/{plant}', [PlantController::class, 'update'])->middleware('auth');
Route::delete('/admin/plants/{plant}', [PlantController::class, 'destroy'])->middleware('auth');

Route::put('/admin/healer-plant-relations/{id}', [HealerPlantRelationController::class, 'update'])->middleware('auth');
Route::delete('/admin/healer-plant-relations/{id}', [HealerPlantRelationController::class, 'destroy'])->middleware('auth');

Route::put('/admin/tutorials/{tutorial}', [TutorialController::class, 'update'])->middleware('auth');
Route::delete('/admin/tutorials/{tutorial}', [TutorialController::class, 'destroy'])->middleware('auth');

Route::put('/admin/users/{user}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->middleware('auth');

Route::get('/plants/{id}', [\App\Http\Controllers\PlantController::class, 'show'])->name('plants.show');

Route::put('/admin/indigenous-knowledge/{id}', [IndigenousKnowledgeController::class, 'update'])->middleware('auth');
Route::delete('/admin/indigenous-knowledge/{id}', [IndigenousKnowledgeController::class, 'destroy'])->middleware('auth');

Route::get('/plants/featured', [PlantController::class, 'featured'])->name('plants.featured');

Route::get('/search/ethnobotanical', [App\Http\Controllers\AuthController::class, 'ethnobotanicalSearch'])->name('search.ethnobotanical');

Route::put('/admin/feedback/{feedback}', [App\Http\Controllers\FeedbackController::class, 'update'])->middleware('auth');
Route::delete('/admin/feedback/{feedback}', [App\Http\Controllers\FeedbackController::class, 'destroy'])->middleware('auth');

// Healer profile page (static demo)
Route::get('/view-profile', function () {
    return view('User.view_profile');
});

Route::get('/healers/{id}', [App\Http\Controllers\HealerController::class, 'show'])->middleware('auth')->name('healers.show');

// add near other admin routes
Route::post('/admin/profile/avatar', [AdminProfileController::class, 'updateAvatar'])
    ->middleware('auth')
    ->name('admin.avatar.update');
