<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Citys;
use App\Models\User;
use App\Models\XrayTypes;
use App\Models\UserLocations;
use App\Models\Booking;
use Validator;


class ApiController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function stateList()
    {
        $states = State::all();
        return response()->json([
            'status' => 'success',
            'state_list' => $states,
        ]);
    }

    public function cityList($id)
    {
        $city = Citys::where('state_id',$id)->get();
        return response()->json([
            'status' => 'success',
            'city_list' => $city,
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $user = User::where('id', $request->id)->where('otp',$request->otp)->first();
        if(!empty($user->id)){
            return response()->json([
                'status' => 'success',
                'message' => 'otp successfully verify',
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'otp verification failed',
            ]);
        }
    }

    public function forgotPassword(Request $request){

        $user = User::where('mobile', $request->mobile)->orwhere('email', $request->email)->first();
        
        if(!empty($user->id)){
            $user->forgot_otp = '1234';
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Otp successfully send to your mobile number and email id',
            ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'message' => 'you have dont any account registered on this number or email id',
            ]);
        }
   }


    public function verifyForgotOtp(Request $request){
        $user = User::where('id', $request->user_id)->Where('forgot_otp', $request->forgot_otp)->first();
        
        if(!empty($user->id)){
             $user->forgot_otp = '';
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Otp successfully verifyed',
                'user_details' => $user,
            ]);
            
        }else{
           return response()->json([
            'status' => 'failed',
            'message' => 'dont verify your otp',
            'user_details' => '',
            ]);
        }
   }
    public function userProfile($id) {
        $user = User::where('id',$id)->first();
        if(!empty($user->id)){
            return response()->json([
                'status' => 'success',
                'user_details' => $user,
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'user_details' => '',
            ]);
        }
        
    }

    public function updatePassword(Request $request) {
        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User Password updated successfully',
            'user_details' => $user,
        ]);
        
    }
    
    public function updateUserProfile(Request $request){
        $user = User::find($request->user_id);


        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_img = $imageName;

        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'User profile successfully updated',
        ]);
    }

    public function xrayTypes(Request $request) {
        $xray_types = XrayTypes::where('status',1)->get();
        if($xray_types){
            return response()->json([
            'status' => 'success',
            'xray_types' => $xray_types,
        ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'user_details' => '',
        ]);    
        }
    }

    public function addLocation(Request $request) {
        
        $user_location = UserLocations::create([
            'user_id' => $request->user_id,
            'location_type' => $request->location_type,
            'full_location' => $request->full_location,
            'door_block_no' => $request->door_block_no,
            'appartment_road_area' => $request->appartment_road_area,
            'direction_to_reach' => $request->direction_to_reach,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => 1,
        ]);

        if($user_location){
            return response()->json([
            'status' => 'success',
            'user_location' => $user_location,
        ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'user_location' => '',
        ]);    
        }
    }
    
    public function userLocations($id) {
        $userLocations = UserLocations::where('user_id',$id)->get();
        if(!empty($userLocations)){
            return response()->json([
                'status' => 'success',
                'user_locations' => $userLocations,
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'user_locations' => '',
            ]);
        }
    }

    public function AddBooking(Request $request) {
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'location_id' => $request->location_id,
            'xray_type_id' => $request->xray_type_id,
            'investigation_required' => $request->investigation_required,
            'images' => $request->images,
            'description' => $request->description,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'booking_amount' => $request->booking_amount,
            'payment_mode' => $request->payment_mode,
            'payment_status' => 0,
            'booking_status' => 0,
        ]);

        if($booking){
            return response()->json([
            'status' => 'success',
            'booking_details' => $booking,
        ]);
        }else{
            return response()->json([
            'status' => 'failed',
            'booking_details' => '',
        ]);    
        }
    }

    public function bookingDetails($id) {
        $bookingDetails = Booking::where('id',$id)->get();
        if(!empty($bookingDetails)){
            return response()->json([
                'status' => 'success',
                'booking_details' => $bookingDetails,
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'booking_details' => '',
            ]);
        }
    }

}

