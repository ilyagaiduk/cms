<?php


namespace App\Http\Controllers;

use App\Tracks;
use App\Api;
use App\Config;
use Illuminate\Support\Facades\DB;

class FunctionController
{

    public function HandlerId()
    {
        $modelTracks = new Tracks();
        $saveId = $modelTracks->saveIdTracks();
        return 'Id записаны';
    }

    public function TrackInBase()
    {
        $model = new Tracks();
        return $model->inBase();
    }
    public function refreshStatus()
    {
        DB::table('tracks')
            ->where('status', 2)
            ->update(['status' => 0]);
    }

}
