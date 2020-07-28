<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestStatus extends Model
{
    use SoftDeletes;

    protected  $table="request_status";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requestId','status','userId','stepId'
    ];

    public function User()
    {
        return $this->belongsTo('App\Users', 'userId');
    }

    public function Request()
    {
        return $this->belongsTo('App\Request', 'requestId');
    }

    public function Step()
    {
        return $this->belongsTo('App\Step', 'stepId');
    }



}
