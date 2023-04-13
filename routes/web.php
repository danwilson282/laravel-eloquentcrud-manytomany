<?php
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

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
Route::get('/create', function () {
    $user = User::findOrFail(1);
    //insert and assign a role
    $role = new Role(['name'=>'Administrator']);
    $user->roles()->save($role);
});
Route::get('/read', function () {
    $user = User::findOrFail(1);
    foreach($user->roles as $role){
        dd($role);
    }
});
Route::get('/update', function () {
    $user = User::findOrFail(1);
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name=="administrator"){
                $role->name = "Admin";
            }
            else{
                $role->name = "administrator";
            }
            $role->save();
        }
    }

});
Route::get('/delete', function () {
    $user = User::findOrFail(1);
    foreach($user->roles as $role){
        $role->whereId(5)->delete();
    }
    //$user->roles()->delete();
});
