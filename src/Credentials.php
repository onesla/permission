<?php


namespace Onesla\Permission;



use Illuminate\Support\Facades\Route;

class Credentials
{
    public static function getCredentials()
    {
        return collect(Route::getRoutes())
            ->unique(function ($item) {
                return $item->getName();
            })
            ->filter(function ($value, $key) {
                return in_array('has_access', $value->middleware()) && !empty($value->getName());
            })
            ->map(function ($value, $key) {
                return [
                    'uri' => $value->uri,
                    'name' => $value->getName(),
                    'method' => $value->methods
                ];
            })
            ->values();
    }
}
