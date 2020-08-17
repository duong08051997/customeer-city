<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    protected $table ='customers';

    public function city()
    {
        return $this->belongsTo('App\City');

    }
    use SoftDeletes;
    protected $dates =['deleted_at'];
}
