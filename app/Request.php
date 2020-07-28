<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'requestType', 'justification', 'stepId', 'attachment'
    ];

    public function RequestType()
    {
        return $this->belongsTo('App\RequestType', 'requestType');
    }

    public function Step()
    {
            return $this->belongsTo('App\Step', 'stepId');
    }



}
