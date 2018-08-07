<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'cities';
    protected $fillable = [
        'id','name', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
   public function contactsToCity()
    {
        return $this->hasMany('App\Contact');
    }
}
