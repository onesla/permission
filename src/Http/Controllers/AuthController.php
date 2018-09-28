<?php


namespace Onesla\Permission\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), config('permission.validator.register'));

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), config('permission.validator.login'));

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::check()) {
            return redirect()->intended();
        }

        if (Auth::attempt($request->only('email', 'password'), $request->input('remember', false))) {
            return redirect()->intended();
        } else {
            return redirect()
                ->back()
                ->withErrors(['auth' => config('permission.message.auth_fail')]);
        }
    }
}
