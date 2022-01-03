<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    public function hashData() {
        $data = [];
        $data['hash'] = 'VNxcHnVz1Hrlb4s2imz';
        $data['passSite'] = 'ziz~bdm5lu1Nf%6rKBNU';
        $data['saltSite'] = 'huDFVNZ%#$*&1975';
        return $data;
    }
    //функция кодирования
    public function encode($string, $password, $Salt)
    {

        $StrLen = strlen($string);
        $Seq = $password;
        $Gamma = '';
        while (strlen($Gamma) < $StrLen) {
            $Seq = pack("H*", sha1($Gamma . $Seq . $Salt));
            $Gamma .= substr($Seq, 0, 8);
        }
        return $string ^ $Gamma;
    }
    public function genHash() {
        //hash
        $hash = $this->hashData()['hash'];
        $passSite = $this->hashData()['passSite'];
        $saltSite = $this->hashData()['saltSite'];

                $string = $hash . "_" . time();
                $password = $passSite;
                $Salt = md5($saltSite);
           $domain = 'beta.mp3api.org';
            $hash = $this->encode($string, $password, $Salt);
            $base64 = base64_encode($hash);
            $result = strtr($base64, '+/=', '._-');
            $arrChr = [
                'A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i',
                'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r',
                'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z'
            ];
                $hash = substr($result, 0, 4) . $arrChr[mt_rand(0, 50)] . substr($result, 4);
            return $hash;

    }
    public function getApi($query, $p)
    {
        if (!$query) {
            $result = Null;
            return $result;
        } else {
            $url = 'http://mp3api.org/music?query=' . $query . '&p=' . $p . '&limit=20&hash='.$this->genHash().'';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
            curl_setopt($ch, CURLOPT_TIMEOUT, 200);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $content = curl_exec($ch);
            curl_close($ch);
//            //отправляем запрос
//            $opts = array(
//                'http' => array(
//                    'method' => "GET",
//                    'header' => "Accept-language: en\r\n" .
//                        "Cookie: foo=bar\r\n"
//                )
//            );
//            $context = stream_context_create($opts);
//// Открываем файл с помощью установленных выше HTTP-заголовков
//            $json = file_get_contents('http://mp3api.org/music?query=' . $query . '&p=' . $p . '&limit=20&hash='.$this->genHash().'', false, $context);
            $result = json_decode($content);
            if (isset($result->error)) {
                return abort('404');
            } else {
                $total = $result->total;
                $countPaginate = ceil($total / 21);
                $arrPaginate = [];
                for ($i = 1; $i <= $countPaginate; $i++) {
                    if ($i == $p) {
                        $arrPaginate[] = (array)$result;
                    } else {
                        $arrPaginate[] = $i;
                    }
                }

                return $arrPaginate;
            }
        }
    }

    public function getApiTrack($id)
    {
        $url = 'http://mp3api.org/track?id=' . $id . '&hash='.$this->genHash().'';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $content = curl_exec($ch);

        curl_close($ch);
        $result = json_decode($content);
        return $result;
    }
    public function HandlerQuery($s)
    {
        $s = preg_replace("/\&page(.*)/", "", $s);
        $s = preg_replace('/\W+/', '', $s);
        return $s;

    }

}
