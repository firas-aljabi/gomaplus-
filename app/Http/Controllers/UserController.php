<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
  
    public function loginUser(Request $request)
     {
         try {
             $validateUser = Validator::make($request->all(), 
             [
                 'email' => 'required',
                 'password' => 'required'
             ]);
 
             if($validateUser->fails()){
                 return response()->json([
                     'status' => false,
                     'message' => 'validation error',
                     'errors' => $validateUser->errors()
                 ], 401);
             }
 
             if(!Auth::attempt($request->only(['email', 'password']))){
                 return response()->json([
                     'status' => false,
                     'message' => 'Email & Password does not match with our record.',
                 ], 401);
             }
 
             $user = User::where('email', $request->email)->first();
 
             return response()->json([
                 'status' => true,
                 'message' => 'User Logged In Successfully',
                 'token' => $user->createToken("API TOKEN")->plainTextToken,
                 'user'=> $user
             ], 200);
 
         } catch (\Throwable $th) {
             return response()->json([
                 'status' => false,
                 'message' => $th->getMessage()
             ], 500);
         }
     }
    //  public function update(Request $request, $id)
    // {
    // //   Validate the request data
    //   $validatedData =([
    //     'email' => $request->input('firstname'),
    //     'lastname' =>  $request->input('lastname'),
    //     'location' => $request->input('location'),
    //     'phonenumber' => $request->input('phonenumber'),
    //     'email' =>  $request->input('email')
    //   ]);
   
    //   // Update the item in the database
    //   $item = User::find($id);
    //   $item->update($validatedData);
   
    //   return response()->json([
    //     'success' => true,
    //     'data' => $item
    //   ]);
    // }
}
