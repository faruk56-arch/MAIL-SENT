<?php

use App\Mail\Contact;
use App\Http\Controllers\Member;
use App\Http\Controllers\MailSend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScoutController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PostPageController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('post', function () {
    return response()->json([
        'message' => 'Hello World',
        "description" => "This is a simple example of a RESTful web service.",
        "documentation" => "the route is /post"
    ]);
}); // To verify that the route is working, you can use the route command:
// php artisan route:list to get all route in terminal




Route::match(['get', 'post'], '/', [Member::class, 'memberIndex'])->name('member');
Route::get('list', [Member::class, 'memberIndex']);
Route::match(['get', 'post'], '/add-blog-post/{id}', [PostPageController::class, 'detailPost'])->name('blog-post');
Route::get('/add-blog-post/{id}', [PostPageController::class, 'detailPost']);
Route::post('store-form', [PostController::class, 'store']);

Auth::routes();

Route::get('/player', [PlayerController::class, 'index'])->name('player')->middleware('player');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/add-blog-post', [PostPageController::class, 'PostIndex'])->name('blog-post');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');
Route::get('/player', [PlayerController::class, 'index'])->middleware(['auth'])->name('player');

// Route::get('/test-contact',[Contact::class, 'Mailable']);
Route::get('/mail', [TestController::class, 'send']);





Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard')->middleware('admin');


require __DIR__ . '/auth.php';
