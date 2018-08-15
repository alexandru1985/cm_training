<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    public function getPosterUsername() {
        
        return $this->belongsTo('App\User','user_id'); 
        
        // daca metoda nu este user (in acest caz getPosterUsername) se parseaza si cheia externa,
        // pentru ca Laravel nu construieste cheia externa utilizand numele metodei
        
    }
    public function getPapername() {
        
        return $this->belongsTo('App\Paper','paper_id'); 
               
    }

}
