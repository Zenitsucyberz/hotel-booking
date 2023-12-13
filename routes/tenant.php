<?php

declare(strict_types=1);

use App\Http\Controllers\app\AminityController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\app\{
    BusinessController,
    CustomerController as AppCustomerController,
    ProfileController,
    ReservationController,
    UserController,
    RoomCategoryController,
    RoomsController,
};
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('app.welcome');
    });


    Route::get('/dashboard', function () {
        return view('app.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('users', UserController::class);
            Route::resource('business', BusinessController::class);
            Route::resource('roomcategories', RoomCategoryController::class);
            Route::resource('aminities', AminityController::class);
            Route::resource('rooms',RoomsController::class);
            Route::resource('customers',AppCustomerController::class);
            
        });
        Route::middleware(['setReservationUser'])->group(function () {
            Route::resource('reservations',ReservationController::class);
        });
    });

    require __DIR__ . '/tenant-auth.php';
});
