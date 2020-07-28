<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestStatus extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requestId','status','userId'
    ];

    public function User()
    {
        return $this->belongsTo('App\Users', 'userId');
    }

    public function Request()
    {
        return $this->belongsTo('App\Request', 'requestId');
    }



}
