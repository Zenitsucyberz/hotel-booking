<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/users', function () {



    return response(['data' => ['users' => \App\Models\User::all() ] , 'messsage' => 'Users Listed']);
});


Route::get('/users/{id}', function ($id) {



    return response(['data' => ['user' => \App\Models\User::find($id) ] , 'messsage' => 'Users Listed']);
});


Route::get('/roles',function(){
    return response(['data'=>['roles'=>Role::all()],'message'=>'roles listed']);
});

Route::post('/users',function(Request $request){
    
    $input = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);
    if(\App\Models\User::create($input)){
        return response()->json(['status'=>true,'message'=>'successfully created'], 201);
        }else{
            return response()->json(['status'=>false, 'message'=>'failed to create user'],409);
            }
            
});

//update users
// Route::post('/users/{id}/update',function(Request $request,$id){
//     // dd($request->all());
//     $input=$request->validate([
//         'name'=>'required|string|max:255',
//         'email'=>"required|string|email|max:255",
//         ]);
//         try{
//             $user=\App\Models\User::where('id',$id)->firstOrFail();
//             $user->update($input);
//             return response()->json(['status'=>true,'message'=>'updated successfully'],200);
//             }catch (\Exception $e){
//                 return response()->json(['status'=>false,'message'=>'not found'],404);
//                 }
//                 });

Route::post('/users/{id}/update',function(Request $request,$id){
    $user = User::where('id',$id)->first();
    if(!$user)
    {
        return response()->json(['status'=>false,'message'=>'user not found'],404);
    }
    $input = $request->validate([
        'name' => 'required|string|max:255',
        'email' => "required|string|email|max:255|unique:users,email," . $user->id,

    ]);
    $user->update($input);
    return response()->json(['status'=>true,'message'=>'updated successfully'],200);

});

Route::post('/users/{id}/delete',function($id){
    $user=User::find($id);
    if(!$user){
        return response()->json(['status'=>false,'message'=>'user not found'],404);
        }
        $user->delete();
        return response()->json(['status'=>true,'message'=>'deleted successfully'],200);
});
