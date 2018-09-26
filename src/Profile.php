<?php


namespace Onesla\Permission;


use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function credentials()
    {
        return $this->belongsToMany(Credential::class)->withTimestamps();
    }
}
