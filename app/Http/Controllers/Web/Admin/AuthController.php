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

class AuthController extends Controller
{
    public function login() 
    {
        return view('layouts.login');
    }

    public function register()
    {
        return view('layouts.registration');
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

        return view('layouts.registration-confirmation', compact('comboCities'));
    }

    public function postRegister(Request $request) {
        $validator =  Validator::make($request->all(),[
            'document_type' => 'required|string|max:255',
            'document_number' => 'required|string',
            'expire_date' => 'required',
            'document_file' => 'required',
            'user_id' => 'required',
            'owner_name' => 'required',
            'owner_phone' => 'required',
            'owner_email' => 'required|unique:users',
            'password' => 'required|string|min:6',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'date' => 'required',
            'time' => 'required',
            'name_authorize' => 'required',
            'telephone_number' => 'required',
            'additional_details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('registration-confirmation')->with('errors', $validator->errors());
        }

        $user = User::create([
            'email' => $request->owner_email,
            'password' => $request->password,
            'name' => $request->owner_name,
            'user_id' =>$request->user_id,
        ]);


        Auth::login($user);

        if ($request->hasFile('documents_file')) {

            $docFile = $request->file('documents_file');
            $path = $docFile->storeAs('public/documents_file');
            $picUrl = url(Storage::url($path));
        }

        $detailUser  = UserDetail::create([
            'user_id' => Auth::user()->id,
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
            'documents_type' => $request->document_type,
            'document_number' => $request->document_number,
            'documents_expire_date' => $request->expire_date,
            'documents_file' => $picUrl,
            'role' => 'owner'
        ]);

        return redirect('login')->with('success', 'Registered Successfully');
    }

    public function postLogin(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')->with('errors', $validator->errors());
        }

        $credentials = $request->only('email', 'password');

        $login = Auth::attempt($credentials);

        $request->session()->regenerate();

        return redirect('/home');

    }

}
