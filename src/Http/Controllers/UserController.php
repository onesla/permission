<?php


namespace Onesla\Permission\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), config('permission.validator.user'));

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        return redirect()->route(config('permission.redirection.user'))->with('response', User::create($data));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), config('permission.validator.user'));

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        if ($request->has('password')) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return redirect()->route(config('permission.redirection.user'))->with('response', $user);
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect()->route(config('permission-redirection.user'))->with('response', true);
    }
}