<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\jobs\Sendcode;
use App\Models\Driver;
use App\Models\Vendor;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Twilio\TwiML\Voice\Client;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use SebastianBergmann\Type\Exception;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;



class AuthController extends Controller
 {
      use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
      private $twilioClient;
/**
 * Execute the console command.
 *
 * @return void
 */

public function __construct()
{

    $sid = config('services.twilio.account_sid');
    $token = config('services.twilio.auth_token');
    $this->twilioClient = new Client($sid, $token);
    // dd($this->twilioClient);
}


    public function register(Request $request )
    {
        // dd($request->all());
        $request->validate([
            // 'name' => 'required',
            // 'email' => 'required|unique:users,email',
            // 'password' => 'required|min:6',
            'phone_no' =>'required'
        ]);
        $user=User::get();
        $this->user = $user;
           // dd("sa");
        $code = rand(70000,100);

        $user = User::create([
            // 'name' => 'null',
            'phone_no' => $request->phone_no,
            // 'image' => 'null',
            // 'address' => 'null',
            // 'email' => 'null',
            // 'password' => 'null',
            'code' => $code
        ]);

        $message = $this->twilioClient->messages->create(
            // dd($message),
            '+9203164377598',
            [
                'from' => '+18606504094',
                'body' => $code.'is your verification code'
            ]
        );


        $user->roles()->attach(2);
        $authToken = $user->createToken('auth-token')->plainTextToken;
        $user = User::latest('created_at')->first();
        // dd($user);
        $user->remember_token = $authToken;
        $user->update();
// dd($user);

        return response()->json([
            'access_token' => $authToken,
             'user'  => $user
        ]);
        // dd("sana");



    }


    public function register_verify(Request $request)
    {

        $user_id=0;
       $user_id= $request->bearerToken();
// dd($user_id);
       $user_code = User::select('code')->where('remember_token', $user_id)->first();

         if($user_code->code == $request->code){
            $user=User::where('code',$user_code->code)->first();
            $user->update(['email_verified_at'=>now()]);

            // return($user);

        //     return response()->json([
        //      'user_details'=>$user

        //    ]);
        return  "Your account is verified";
         }
         else{
            return"code is invalid";
         }

    }
    public function login(Request $request)
{
    // dd($request->all());
    $request->validate([
        // 'email' => 'email|required',
        // 'password' => 'required'
        'phone_no' =>'required',
    ]);

    $code = rand(70000,100);
//    dd($code);
    $user = User::where('phone_no', $request->phone_no)->first();
    if($user->email_verified_at !=null){
// dd($user);
    if(isset($user->roles[1])){
        if($user->roles[1]->title=="Driver"){
         $authToken = $user->createToken('auth-token')->plainTextToken;

         $driver=Driver::where('user_id',$user->id)->get();
        //  dd($user);
         return response()->json([
             'access_token' => $authToken,
             'driver_details'=>$driver
            ]);

        }elseif ($user->roles[1]->title=="Vendor") {
            $authToken = $user->createToken('auth-token')->plainTextToken;

            $vendors=Vendor::where('user_id',$user->id)->get();
            //  return ;
            return response()->json([
                'access_token' => $authToken,
                'Vendor_details'=>$vendors
            ]);

        }

    }
}

    else{
        return "Not verified !    First verify your Account";
    }



    $authToken = $user->createToken('auth-token')->plainTextToken;
   $user->update(['code'=>$code]);
   $code1 = $user->code;
   // return($user);
    return response()->json([
        'access_token' => $authToken,
            'Verify_code '=>$code1
        ]);


    }
    public function login_verify(Request $request){
        $request->validate([
            // 'email' => 'email|required',
            // 'password' => 'required'
            'code' =>'required',
        ]);
        $user_id=0;
        $user_id= $request->bearerToken();
        $user = User::where('remember_token', $request->remember_token)->first();
        $authToken = $user->createToken('auth-token')->plainTextToken;
        //  return($authToken);

        $user_code = User::select('code')->where('code', $request->code)->first();
        //  dd($user_code);
         if($user_code)
         {
        if($user_code->code == $request->code){
            $user1=User::where('code',$user_code->code)->first();
            $user1->update(['remember_token'=> $request->remember_token]);
            $user1->update(['email_verified_at'=>now()]);

        //  dd($user1);
            // return"Login Successfully";
            return response()->json([
                'message' => "Login Successfully",
                    'status '=>200
                ]);
        }
        else{
           return response()->json([
                'message' => "Invalid Login ",
                    'status '=>false
                ]);
        }
    }
        else{

            return"Code is invalid";
        }



        }
        public function index(Request $request){
        // $this->user = $user;
        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');
        $this->twilioClient = new Client($sid, $token);

        $attributes = request()->validate([
            'phone_no' => 'required',

        ]);
        $phone_no = $request->phone_no;
        $body = rand(70000,100);
        // dd($body);
        $message = $this->twilioClient->messages->create(
            // dd($message),
            '+9203164377598',
            [
                'from' => '+18606504094',
                'body' => $body
            ]
        );
        Log::info($message->sid);

        $exitCode = Artisan::call('Code:send-code', []);

        return back()->with('message', 'Email Sent successfully!');

        }





}
