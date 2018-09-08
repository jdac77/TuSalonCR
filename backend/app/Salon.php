<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $fillable = [
        'logo', 'name', 'address', 'phone', 'email', 'contact', 'state',
    ];

    public function users(){
        return $this->belongsTo('User', 'user_salon', 'user_id', 'salon_id');
      }

}
