<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Config extends Model

{
    protected $config;
    public function forRedirect()
    {
        $ftp_serv = "78.47.232.238";
        $ftp_user = "soundcloud_ftp";
        $ftp_pass = "6rT6VQ8WLpWrzh59";
        $this->config = Storage::disk('local')->get('config.json');
        $data = json_decode($this->config);
        $result = [
            'domain' => $data->domain,
            'www' => $data->forwww,
            'prefixSearch' => $data->prefixSPSEO,
            'prefixForTrackP' => $data->prefixForTrackP,
            'separatorForSearchSP' => $data->separatorForSearchSP,
            'postfixForSearchSP' => $data->postfixForSearchSP,
            'countTagsSTP' => $data->countTagsSTP,
            'countRelatedSTP' => $data->countRelatedSTP,
            'sizeTumbSiteS' => $data->sizeTumbSiteS,
            'ftp_serv' => $ftp_serv,
            'ftp_user' => $ftp_user,
            'ftp_pass' => $ftp_pass,

        ];
        return $result;
    }
}
