<?php

declare(strict_types=1);

use App\Http\Controllers\app\AminityController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\app\{
    BusinessController,
    CustomerController as AppCustomerController,
    CustomerInfoController,
    DashBoardController,
    InvoiceController,
    ProfileController,
    ReservationController,
    UserController,
    RoomCategoryController,
    RoomsController,
    TaxController,
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


    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('users', UserController::class);
            Route::resource('business', BusinessController::class);
            Route::resource('roomcategories', RoomCategoryController::class);
            Route::resource('aminities', AminityController::class);
            Route::resource('rooms', RoomsController::class);


            Route::post('/customers/sort-customer', [AppCustomerController::class, 'sortCustomer'])->name('customers.sortCustomer');
            Route::resource('customers', AppCustomerController::class);

            // reservations
            Route::post('/reservations/check-room-availability', [ReservationController::class, 'checkRoomAvailability'])->name('reservations.checkRoomAvailability');
            Route::get('/getdatatabledata', [ReservationController::class, 'getDataTableData'])->name('getDataTableData');
            Route::get('reservations/{reservation}/invoice', [ReservationController::class, 'invoice'])->name('reservations.invoice');
            Route::resource('reservations', ReservationController::class);

            // Tax Details
            Route::resource('taxes', TaxController::class);
        });
    });

    require __DIR__ . '/auth.php';
});
