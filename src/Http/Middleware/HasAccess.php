<?php


namespace Onesla\Permission\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Onesla\Permission\Profile;

class HasAccess
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403);
        }

        if (!$this->hasPermission($this->getFunctionName($request), Auth::user()->profile_id)) {
            abort(403);
        }

        return $next($request);
    }

    protected function hasPermission($function_name, $id)
    {
        if (empty($id)) {
            return false;
        }

        $profile = Profile::find($id)->credentials;

        if (empty($profile)) {
            return false;
        }
    }

    protected function getFunctionName(Request $request)
    {
        return app('router')->getRoutes()->match(app('request')->create($request->path(), $request->method()))->getName();
    }
}