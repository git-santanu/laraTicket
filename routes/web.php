<?php

use App\Http\Controllers\ticketController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function(){
    // Route::get('/dashboard', function(){
    //     return view('dashboard')->name('dashboard');
    // });
    Route::resource('ticket',ticketController::class);
    Route::get('/addRoles',function(){
        $roles = [
            ['name' => 'admin','guard_name'=>'web'],
            ['name' => 'user','guard_name'=>'web'],
            ['name' => 'agent','guard_name'=>'web'],
            ['name' => 'client','guard_name'=>'web'],
        ];
        $role = Role::insert($roles);
        return "Succedd";
    });
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/',[ticketController::class,'index']);
// Route::resource('ticket',ticketController::class);
// Route::get('/addRoles',function(){
//     $roles = [
//         ['name' => 'admin','guard_name'=>'web'],
//         ['name' => 'user','guard_name'=>'web'],
//         ['name' => 'agent','guard_name'=>'web'],
//         ['name' => 'client','guard_name'=>'web'],
//     ];
//     $role = Role::insert($roles);
//     return "Succedd";
// });
