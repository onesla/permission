<?php


namespace Onesla\Permission\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Onesla\Permission\Credential;
use Onesla\Permission\Profile;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), config('permission.validator.profile'));

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $profile = Profile::create($request->only('name', 'description'));
        $ids = [];

        foreach ($request->input('credentials') as $credential) {
            $credential = Credential::firstOrCreate(['function_name' => $credential]);
            array_push($ids, $credential->id);
        }

        $profile->credentials()->attach($ids);

        return redirect()->route(config('permission.redirection.profile'))->with('response', $profile);
    }

    public function update($id, Request $request)
    {
        $profile = Profile::findOrFail($id);

        $validator = Validator::make($request->all(), config('permission.validator.profile'));

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $profile->update($request->only('name', 'description'));
        $ids = [];

        foreach ($request->input('credentials') as $credential) {
            $credential = Credential::firstOrCreate(['function_name' => $credential]);
            array_push($ids, $credential->id);
        }

        $profile->credentials()->sync($ids);

        return redirect()->route(config('permission.redirection.profile'))->with('response', $profile);
    }

    public function delete($id)
    {
        Profile::destroy($id);

        return redirect()->route(config('permission.redirection.profile'))->with('response', true);
    }
}
