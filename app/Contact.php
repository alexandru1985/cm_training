<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{  
//    protected $table = 'contacts';
    protected $fillable = [
        'name', 'email', 'address', 'company', 'phone', 'group_id', 'photo', 'user_id','city_id'
    ];

    public function group()
	{
		return $this->belongsTo('App\Group');
	}
    public function city()
	{
		return $this->belongsTo('App\City');
	}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
