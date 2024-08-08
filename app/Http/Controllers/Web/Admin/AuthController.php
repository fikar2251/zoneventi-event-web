<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login() 
    {
        return view('layouts.login');
    }

    public function register()
    {
        return view('layouts.registration');
    }

    public function postRegisterStep1(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'document_type' => 'required|string|max:255',
            'document_number' => 'required',
            'expire_date' => 'required|date',
            'document_file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the errors in the form.');
        }

        try {
            // Store file
            if ($request->hasFile('document_file')) {
                $docFile = $request->file('document_file');
                $path = $docFile->store('public/documents_file');
                $picUrl = Storage::url($path);
            }

            // Store data in session
            Session::put('register_step1', [
                'document_type' => $request->document_type,
                'document_number' => $request->document_number,
                'expire_date' => $request->expire_date,
                'document_file' => $picUrl ?? null,
            ]);

            return redirect()->route('registration.confirmation')
                ->with('success', 'Step 1 completed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred. Please try again.');
        }
    }

    public function registerConfirmation()
    {
        $client = new Client();
        $url = 'https://countriesnow.space/api/v0.1/countries/cities';

        $response = $client->request("POST", $url, [
            'json' => [
                'country' => 'italy',
            ],
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);
        $responseData = $response->getBody()->getContents();
        $comboCities = json_decode($responseData, true);

        $cities = $comboCities['data'] ?? [];

        return view('layouts.registration-confirmation', compact('cities'));
    }

    public function postRegisterStep2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'owner_name' => 'required',
            'owner_phone' => 'required',
            'owner_email' => 'required|email',
            'password' => 'required|string|min:6',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'name_authorize' => 'required',
            'telephone_number' => 'required',
            'additional_details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve step 1 data
        $step1Data = Session::get('register_step1');

        if (!$step1Data) {
            return redirect()->route('registration')->with('error', 'Please complete step 1 first.');
        }

        // Create user
        $user = User::create([
            'email' => $request->owner_email,
            'password' => bcrypt($request->password),
            'name' => $request->owner_name,
            'user_id' => $request->user_id,
            'role' => 'owner'
        ]);

        // Create user details
        UserDetail::create([
            'user_id' => $user->id,
            'full_name' => $request->owner_name,
            'username' => $request->user_id,
            'phone' => $request->owner_phone,
            'email' => $request->owner_email,
            'country' => $request->country,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'date_visit' => $request->date,
            'time_visit' => $request->time,
            'contact_person_name' => $request->name_authorize,
            'contact_person_phone' => $request->telephone_number,
            'notes' => $request->additional_details,
            'documents_type' => $step1Data['document_type'],
            'document_number' => $step1Data['document_number'],
            'documents_expire_date' => $step1Data['expire_date'],
            'documents_file' => $step1Data['document_file'],
        ]);

        // Clear session data
        Session::forget('register_step1');

        return redirect('login')->with('success', 'Registered Successfully');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            $request->session()->regenerate();
            if ($user->role == 'admin') {
                return redirect('/home')->with('success', 'Login successful!');
            } else {
                return redirect('/owner/club-events')->with('success', 'Login successful!');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully!');
    }

    public function getCityList(Request $request)
    {
        $query = $request->input('q');
        $country = $request->input('country');

        $client = new Client();
        $url = 'https://countriesnow.space/api/v0.1/countries/cities';

        $response = $client->request("POST", $url, [
            'json' => [
                'country' => $country,
            ],
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        $responseData = $response->getBody()->getContents();
        $responseData = json_decode($responseData, true);

        // Filter cities based on the query
        if (isset($responseData['data']['cities'])) {
            $cities = array_filter($responseData['data']['cities'], function($city) use ($query) {
                return stripos($city, $query) !== false;
            });
        } else {
            $cities = [];
        }

        return response()->json(['cities' => array_values($cities)]);
    }

    public function getCity(Request $request)
    {
        $client = new Client();
        $url = 'https://countriesnow.space/api/v0.1/countries/cities';

        $response = $client->request("POST", $url, [
            'json' => [
                'country' => 'italy',
            ],
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);
        $responseData = $response->getBody()->getContents();
        $comboCities = json_decode($responseData, true);

        $cities = $comboCities['data'] ?? [];
    }


}
