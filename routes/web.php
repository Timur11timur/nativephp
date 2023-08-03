<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Native\Laravel\Facades\Notification;
use Native\Laravel\Facades\Settings;
use Native\Laravel\Facades\Window;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (request()->has('openwindow')) {
        Window::open('about')
            ->route('about')
            ->width(800)
            ->height(800)
            //->alwaysOnTop()
            ->showDevTools(false);
    }

    if (request()->has('notification')) {
        Notification::title('Hello from NativePHP')
            ->message('This is a detail message coming from your Laravel app.')
            ->show();
    }

    return view('welcome', [
        'users' => User::all(),
        'theme' => Settings::get('theme', 'default'),
    ]);
});

Route::post('/user', function () {
    User::factory()->create();
    Notification::title('User created!')
        ->message('Details about user')
        ->show();

    return back();
});

Route::view('/about', 'about')->name('about');

Route::get('/settings', function () {
    return view('settings', [
        'theme' => Settings::get('theme', 'default'),
    ]);
})->name('settings');


Route::post('/settings', function (Request $request) {
    Settings::set('theme', $request->theme);

    return redirect('/');
});
