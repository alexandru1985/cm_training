<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contacts() {
        return $this->hasMany(Contact::class);
    }

    public function contactsToCity() {
        return $this->hasMany(City::class);
    }

    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function papers() {
        return $this->hasMany('App\Paper');
    }

    public function address() {
        return $this->hasOne('App\Address');
    }

}
