<?php

namespace App\Http\Controllers\Admin\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Mail\ResetPasswordMail;
use App\Models\MobUsers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return (new ResponseResource('false', $validator->errors(), null))->response()->setStatusCode(400);
        }
        $credentials = $request->only('email', 'password');
        
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'success' => 'false',
                'message' => 'Email or Password is Wrong',
            ], 401);
        }

        $user = Auth::guard('api')->user();
        return response()->json([
                // 'success' => 'true',
                'data' => [
                    'user' => $user,
                    'token' => [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    ]
                ],
                
            ]);
    }

    public function register(Request $request) {
       $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $formattedErrors = [];

            foreach ($errors as $field => $message) {
                $formattedErrors[$field] = $message[0];
            }
            return response()->json([
                'success' => 'false',
                'message' => $formattedErrors,
            ], 400);
            // return (new ResponseResource('false', $formattedErrors, null))->response()->setStatusCode(400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::guard('api')->login($user);
        return response()->json([
            'data' => [
                    'user' => $user,
                    'token' => [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    ]
                ],
        ]);
    }

    public function getUser() {
        $user = User::with('getDetailMobUser')->find(Auth::guard('api')->user()->id);
        return (new ResponseResource(true, 'Users Data', $user))->response()->setStatusCode(200);
    }

    public function logout()  {
        Auth::guard('api')->logout();
        return new ResponseResource('true', 'Succesfully Logged Out', null);
    }

    public function updateProfile(Request $request) {
        $picUrl = null;
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->storeAs('public/profile_picture',Auth::user()->name . '.'.$file->getClientOriginalExtension());
            $picUrl  = url(Storage::url($path));
        }
        try {
            $userData = User::updateOrCreate([
                'id' => Auth::user()->id
            ],[
                'name' => $request->name,
                'email' => $request->email
            ]);
            $data = MobUsers::updateOrCreate([ 
                'user_id' => Auth::user()->id, 
            ], [
                'gender' => $request->gender, 
                'birthdate' => $request->birthdate, 
                'profile_picture' =>  $picUrl,
            ]);
            return new ResponseResource('true', 'Data Successfully Updated', null);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', 'Data Failed Inserted', $th->getMessage()))->response()->setStatusCode(500);
        }

    }

    public function sendOtp(Request $request) {
        $otp = random_int(100000, 999999);
        try {
            $check = User::where('email', $request->email)->first();
            if ($check) {
                DB::table('password_reset_tokens')->updateOrInsert([
                    'email' => $request->email
                ],[
                    'email' => $request->email,
                    'token' => $otp,
                    'created_at' => Carbon::now()
                ]);
                
                Mail::to($request->email)->send(new ResetPasswordMail($otp));
                return (new ResponseResource('true', 'OTP Successfully Send', $otp));
            }else{
                return (new ResponseResource('false', 'Email is not registered!', null))->response()->setStatusCode(400);
            }

        } catch (\Throwable $th) {
            return (new ResponseResource('false', 'OTP Failed Send', $th->getMessage()))->response()->setStatusCode(500);
        }
       
    }

    public function verifyOtp(Request $request) {
        $otp = $request->otp;
        try {
            $check = DB::table('password_reset_tokens')->where('token', $otp)->first();
            if (!$check || Carbon::parse($check->created_at)->addMinutes(10)->isPast()) {
                return (new ResponseResource('false', 'Invalid or expired OTP.', null))->response()->setStatusCode(400);
            }
            return new ResponseResource('true', 'OTP is valid', $check->token);

        } catch (\Throwable $th) {
            return (new ResponseResource('false', 'Errors', $th->getMessage()))->response()->setStatusCode(500);
        }
       
    }

    public function resetPassword(Request $request){
        try {
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            return new ResponseResource('true', 'Successfully Reset Password', $user);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', 'Failed Reset Password', $th->getMessage()))->response()->setStatusCode(500);
        }
    }

    public function changePassword(Request $request){
        try {
            $user = User::where('email', Auth::user()->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            return new ResponseResource('true', 'Successfully Reset Password', $user);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', 'Failed Reset Password', $th->getMessage()))->response()->setStatusCode(500);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
