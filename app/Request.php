<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


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

    protected $appends = [
        'statusId',
    ];

    public function RequestType()
    {
        return $this->belongsTo('App\RequestType', 'requestType');
    }

    public function Step()
    {
            return $this->belongsTo('App\Step', 'stepId');
    }

    public function RequestStatus() {
        return $this->hasMany('App\RequestStatus','requestId','id');
    }

    public function getStatusIdAttribute()
    {
        $stepId = Step::where('userId',Auth::user()->id)->first();
        return $this::StatusId($this->id, $stepId->id, Auth::user()->id);
    }


    public function StatusId($requestId, $stepId, $userId) {

        $allStatus = RequestStatus::where('requestId',$requestId)
        ->where('userId',$userId)
        ->where('stepId',$stepId)->first();
        if($allStatus) {
            return $allStatus->status;
        }
        return -1;
    }


}
