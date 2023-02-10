<?php

namespace App\Http\Controllers;

use App\Models\smarthouse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class smarthouseController extends Controller
{
   
    
    //Show single listing
    function list(){
        $result=smarthouse::all();
        return $result;
    }
    function showifemailexist(){
        $result=smarthouse::all();
        return $result;
    }

    // Show Create Form
    
    public function showthehous($email) {
        return smarthouse::where('email','like',$email) -> first();
    }
    // Store Listing Data
    public function storehouseinfo(Request $request) {
        $list = new smarthouse;
        $list->email = $request->input('email');
        $list->cameras = $request->input('cameras');
        $list->alexa = $request->input('alexa');
        $list->optical_extension = $request->input('optical_extension');
        $list->smart_TV = $request->input('smart_TV');
        $list->Wire_extension = $request->input('Wire_extension');
        $list->smart_light = $request->input('smart_light');
        $list->living_room = $request->input('living_room');
        $list->living_room_2 = $request->input('living_room_2');
        $list->bedroom_1 = $request->input('bedroom_1');
        $list->bedroom_2 = $request->input('bedroom_2');
        $list->bedroom_3 = $request->input('bedroom_3');
        $list->kitchen = $request->input('kitchen');
        $list->detais = $request->input('detais');
       
     
        $list->save();
        return  $list;
    }
  
    public function updatehouse(Request $request, $email)
    {
    //   Validate the request data
      $validatedData =([ 
       'cameras' => $request->input('cameras'),
       'alexa' => $request->input('alexa'),
       'optical_extension' => $request->input('optical_extension'),
       'smart_TV' => $request->input('smart_TV'),
       'Wire_extension' => $request->input('Wire_extension'),
       'smart_light' => $request->input('smart_light'),
       'living_room' => $request->input('living_room'),
       'living_room_2' => $request->input('living_room_2'),
       'bedroom_1' => $request->input('bedroom_1'),
       'bedroom_2' => $request->input('bedroom_2'),
       'bedroom_3' => $request->input('bedroom_3'),
       'kitchen' => $request->input('kitchen'),
       'detais' => $request->input('detais')
      ]);
   
      // Update the item in the database
      $item = smarthouse::where('email','like',$email) ;
      $item->update($validatedData);
   
      return response()->json([
        'success' => true,
        'data' => $item
      ]);
    }

    // Delete Listing
    public function destroy(smarthouse $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
    function listbycatigorie($key){
        return  smarthouse::where('type','Like',"%$key%")->get();
    }
    function search($key){
        return  smarthouse::where('title','Like',"%$key%")->get();
    }
    // Manage Listings
   
}
