<?php


namespace Onesla\Permission\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HasAccess
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403);
        }

        if (!$this->hasPermission($this->getFunctionName($request), Auth::user()->user_profile_id)) {
            abort(403);
        }

        return $next($request);
    }

    protected function hasPermission($function_name, $id)
    {
        return DB::table('profile_credentials')
            ->join('user_credentials', 'user_credentials.id', 'user_credential_id')
            ->where(['function_name', '=', $function_name],
                ['user_profile_id', '=', $id])
            ->orWhere(['function_name', '=', '*'],
                ['user_profile_id', '=', 'id'])
            ->get()
            ->isNotEmpty();
    }

    protected function getFunctionName(Request $request)
    {
        return app('router')->getRoutes()->match(app('request')->create($request->path(), $request->method()))->getName();
    }
}