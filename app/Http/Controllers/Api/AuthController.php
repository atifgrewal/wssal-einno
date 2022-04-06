<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vendor;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'image' => $request->image,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->attach(2); // Simple user role

        return response()->json($user);
    }
    public function login(Request $request)
{
    $request->validate([
        'email' => 'email|required',
        'password' => 'required'
    ]);

    $credentials = request(['email', 'password']);
    if (!auth()->attempt($credentials)) {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => [
                'password' => [
                    'Invalid credentials'
                ],
            ]
        ], 422);
    }

    $user = User::where('email', $request->email)->first();
    
    if(isset($user->roles[1])){
        if($user->roles[1]->title=="Driver"){
         $authToken = $user->createToken('auth-token')->plainTextToken;
         
         $driver=Driver::where('user_id',$user->id)->get();
        //  return ;
        return response()->json([
            'access_token' => $authToken,
            'driver_details'=>$driver
        ]);

        }elseif ($user->roles[1]->title=="Vendor") {
            $authToken = $user->createToken('auth-token')->plainTextToken;
         
         $driver=Vendor::where('user_id',$user->id)->get();
        //  return ;
        return response()->json([
            'access_token' => $authToken,
            'Vendor_details'=>$driver
        ]);

        }
       
    }

        
        $authToken = $user->createToken('auth-token')->plainTextToken;
        // return "asfasf";
        return response()->json([
            'access_token' => $authToken,
            'Customer_details'=>$user,
        ]);
    
}
}
