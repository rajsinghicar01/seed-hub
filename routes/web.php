<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\CropController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\ZoneController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\VarietyController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ControllingAuthorityController;
use App\Http\Controllers\Admin\CentreController;
use App\Http\Controllers\Admin\SeedTargetController;
use App\Http\Controllers\Admin\SeedProductionStatusController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\SeedAvailabilityController;

use Illuminate\Support\Facades\Auth;

Auth::routes();
  
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', function(){
    return view('pages.about');
})->name('about');

Route::get('/contact-us', function(){
    return view('pages.contact');
})->name('contact');

Route::get('/seed-availability', [SeedAvailabilityController::class, 'index'])->name('seed-availability');
Route::post('/get_states_by_zone', [SeedAvailabilityController::class,'get_states_by_zone'])->name('get_states_by_zone_front');
Route::post('/get_variety_by_crop', [SeedAvailabilityController::class,'get_variety_by_crop'])->name('get_variety_by_crop');
  
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::get('profile', [UserController::class,'profile'])->name('profile');
    Route::put('update-profile/{id}', [UserController::class,'update_profile'])->name('update_profile');
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('crops', CropController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('seasons', SeasonController::class);
    Route::resource('zones', ZoneController::class);
    Route::resource('states', StateController::class);
    Route::resource('varieties', VarietyController::class);
    Route::resource('designations', DesignationController::class);
    Route::resource('controlling-authorities', ControllingAuthorityController::class);
    Route::post('centres/get_states_by_zone', [CentreController::class,'get_states_by_zone'])->name('get_states_by_zone');
    Route::resource('centres', CentreController::class);
    Route::post('centres/get_varieties_by_crop', [SeedTargetController::class,'get_varieties_by_crop'])->name('get_varieties_by_crop');
    Route::post('/delete-seed-target-items', [SeedTargetController::class, 'delete_seed_target_items'])->name('delete_seed_target_items');
    Route::post('/get_seed_target_items', [SeedTargetController::class, 'get_seed_target_items'])->name('get_seed_target_items');
    Route::resource('seed-targets', SeedTargetController::class);
    Route::post('/get-seed-production-statuses', [SeedProductionStatusController::class, 'get_seed_production_statuses'])->name('get_seed_production_statuses');
    Route::post('status_update', [SeedProductionStatusController::class, 'status_update'])->name('status_update');
    Route::resource('seed-production-statuses', SeedProductionStatusController::class);
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity.logs');

    Route::get('add-more', [ProductController::class, 'index']);
    Route::post('add-more', [ProductController::class, 'store'])->name('add-more.store');
    
    // Route::get('/profile', function (Request $request) {
    //     return 'profile will be here...';
    // })->name('profile');

});
