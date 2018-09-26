<?php


namespace Onesla\Permission\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Onesla\Permission\Credential;
use Onesla\Permission\Profile;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $profile = Profile::create($request->only('profile_name', 'profile_description'));

        foreach ($request->input('credentials') as $credential) {
            $credential = Credential::firstOrCreate(['function_name' => $credential]);
            $profile->credentials()->attach($credential->id);
        }
    }
}
