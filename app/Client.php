<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $fillable=[
      'name',
      'apepat',
      'apemat',
      'email'

    ];
    public function country(){
      return $this->belongsTo('App\Country');
    }
}
