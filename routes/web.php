<?php

use App\Livewire\Profile;
use App\Livewire\Admin\Pages;
use App\Livewire\Front\Items;
use App\Livewire\Front\Detail;
use App\Livewire\Admin\Packages;
use App\Livewire\Home\Dashboard;
use App\Livewire\Admin\Purchases;
use App\Livewire\Front\Auth\Login;
use App\Livewire\Admin\EnvatoSetting;
use App\Livewire\Front\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Front\HomeController;
use App\Livewire\Admin\Dashboard as AdminDashboad;

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

Route::get('/', HomeController::class . '@index')->name('home');
Route::get('/search', HomeController::class . '@search')->name('search');
Route::get('/items', Items::class . '@index')->name('items');
Route::get('/packages', HomeController::class . '@packages')->name('packages');

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', Login::class . '@index')->name('auth.login');
    Route::get('/auth/register', Register::class . '@index')->name('auth.register');
});

Route::get('auth/google', [GoogleController::class, 'signInwithGoogle'])->name('auth.google');
Route::get('callback/google', [GoogleController::class, 'callbackToGoogle'])->name('callback.google');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/auth/logout', ExtraController::class . '@logout')->name('auth.logout');
    
    Route::get('/user/profile', ExtraController::class . '@profile')->name('user.profile');
    Route::get('/user/account', ExtraController::class . '@account')->name('user.account');
    Route::get('/user/payment_options', ExtraController::class . '@payment_options')->name('user.payment_options');
    Route::get('/user/downloads', ExtraController::class . '@downloads')->name('user.downloads');
    
    
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/event/client_web_events', [ExtraController::class, 'client_web_events'])->name('client_web_events');
    Route::post('/event/update_fcm_token', [ExtraController::class, 'update_fcm_token'])->name('update_fcm_token');
    Route::middleware(['admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', AdminDashboad::class)->name('admin.dashboard');
            Route::get('/settings', Profile::class)->name('admin.settings');
            Route::get('/settings/envato', EnvatoSetting::class)->name('admin.settings.envato');
            Route::get('/packages', Packages::class)->name('admin.packages');
            Route::get('/purchases', Purchases::class)->name('admin.purchases');
            Route::get('/pages', Pages::class)->name('admin.pages');
        });
    });
});


Route::get('/{slug}', Detail::class . '@index')->name('item.slug');
