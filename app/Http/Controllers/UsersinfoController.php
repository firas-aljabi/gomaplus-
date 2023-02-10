<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UsersInfo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersinfoController extends Controller
{
   

    //Show single listing
    function list(){
        $result=UsersInfo::all();
        return $result;
    }


    // Show Create Form
    
    public function show($email) {
        return UsersInfo::where('email','like',$email) -> first();
       
    }
    // Store Listing Data
    public function store(Request $request) { 
        $list = new UsersInfo;
        $list->firstname = $request->input('firstname');
        $list->lastname = $request->input('lastname');
        $list->email = $request->input('email');
        $list->location = $request->input('location');
        $list->phonenumber = $request->input('phonenumber');
        // $list->password =  $list->phonenumber;
        $list->save();
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
              
               'email'=>'required',
             
                'phonenumber' => 'required',
              
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                
                'email' => $request->email,
                'password' => Hash::make($request->phonenumber),
               
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        return  $list;
    }
  
    // Show Edit Form
  
    // function update(Request $request,$id){
    //     $emp=State::where('id',$id)->first();
    //     $emp->update(['state' =>$request->input("state")]);
    //     // $emp->amount = $request->amount;
    //     $emp->save();
    //     return  $emp;
    //  }
    // Update Listing Data
    public function update(Request $request, $id)
    {
    //   Validate the request data
      $validatedData =([
        'firstname' => $request->input('firstname'),
        'lastname' =>  $request->input('lastname'),
        'location' => $request->input('location'),
        'phonenumber' => $request->input('phonenumber'),
        'email' =>  $request->input('email')
      ]);
   
      // Update the item in the database
      $item = UsersInfo::find($id);
      $item->update($validatedData);
   
      return response()->json([
        'success' => true,
        'data' => $item
      ]);
    }

    // Delete Listing
    public function destroy(UsersInfo $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
    function listbycatigorie($key){
        return  UsersInfo::where('type','Like',"%$key%")->get();
    }
    function search($key){
        return  UsersInfo::where('title','Like',"%$key%")->get();
    }
    // Manage Listings
   
}
