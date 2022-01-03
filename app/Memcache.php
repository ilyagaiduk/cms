<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;


class Memcache extends Model
{
    public function dubleElement($s, $arrQueries)
    {
        if (($key = array_search($s, $arrQueries)) !== FALSE) {
            unset($arrQueries[$key]);
            array_unshift($arrQueries, $s);
        } else {
            $arrQueries[] = $s;
        }
        return $arrQueries;
    }
    public function cacheQuery($s)
    {
        if (empty($s)) {
            if (!Cache::has('arrQueries')) {
                $arrDemo = [
                    'track',
                    'project',
                    'mix',
                    'dido',
                ];
                Cache::forever('arrQueries', $arrDemo);
            }
            return $result = Cache::get('arrQueries');
        } else {
            if (Cache::has('arrQueries')) {
                $arrQueries = Cache::get('arrQueries');
            } else {
                $arrQueries = [];
            }

            Cache::forget('arrQueries');
            if (count($arrQueries) < 100) {
                $resultArr = $this->dubleElement($s, $arrQueries);


                Cache::forever('arrQueries', $resultArr);

            } else {
                $newArr = [];
                for ($i = 1; $i <= 99; $i++) {
                    $newArr[] = $arrQueries[$i];
                }
                dd($newArr);
                $resultArr = $this->dubleElement($s, $newArr);
                Cache::forever('arrQueries', $resultArr);
            }
            $result = Cache::get('arrQueries');
            return $result;
        }

    }

    public function viewsCount($views)
    {
        if (floor($views / 1000000) > 0) {
            $viewsCount = round(($views / 1000000), 2) . 'kk';
        } elseif (floor($views / 1000) > 0) {
            $viewsCount = round(($views / 1000), 2) . 'k';
        } else {
            $viewsCount = $views;
        }

        return $viewsCount;
    }

    public function likes($urlId, $count, $id, $countSecond, $request)
    {
        $badVoteCookie = $request->cookie('dislike' . $urlId);
        $goodVoteCookie = $request->cookie('like' . $urlId);
        $arr = [];
        if ($id == 'like') {
            if (empty($goodVoteCookie)) {
                if (Cache::has($id . $urlId)) {
                    Cache::pull($id . $urlId);
                    Cache::forever($id . $urlId, $count + 1);
                } else {
                    Cache::forever($id . $urlId, 1);
                }
                $arr['like'] = $this->viewsCount(Cache::get($id . $urlId));
                $arr['dislike'] = $this->viewsCount($countSecond);
                Cookie::queue('like' . $urlId, $count + 1, 525600);
            } else {
                $arr['like'] = $this->viewsCount(Cache::get($id . $urlId));
                $arr['dislike'] = $this->viewsCount($countSecond);
            }
        } elseif ($id == 'dislike') {
            if (empty($badVoteCookie)) {
                if (Cache::has($id . $urlId)) {
                    Cache::pull($id . $urlId);
                    Cache::forever($id . $urlId, $count + 1);
                } else {
                    Cache::forever($id . $urlId, 1);
                }
                $arr['dislike'] = $this->viewsCount(Cache::get($id . $urlId));
                $arr['like'] = $this->viewsCount($countSecond);
                Cookie::queue('dislike' . $urlId, $count + 1, 525600);
            } else {
                $arr['dislike'] = $this->viewsCount(Cache::get($id . $urlId));
                $arr['like'] = $this->viewsCount($countSecond);
            }
        }
        return $arr;
    }

    public function getVoites($id)
    {
        $arr = [];
        if (Cache::has('like' . $id)) {
            $arr['like'] = $this->viewsCount(Cache::get('like' . $id));
        } else {
            $arr['like'] = 0;
        }
        if (Cache::has('dislike' . $id)) {
            $arr['dislike'] = $this->viewsCount(Cache::get('dislike' . $id));
        } else {
            $arr['dislike'] = 0;
        }
        if (Cache::has('views' . $id)) {
            $views = Cache::get('views' . $id);
            Cache::pull('views' . $id);
            Cache::forever('views' . $id, $views + 1);
            $arr['views'] = $this->viewsCount(Cache::get('views' . $id));
        } else {
            $arr['views'] = Cache::forever('views' . $id, 1);
        }
        return $arr;
    }

    public function getLikes($id)
    {
        $arr = [];
        if (Cache::has('like' . $id)) {
            $arr['likes'] = $this->viewsCount(Cache::get('like' . $id));
        } else {
            $arr['likes'] = 0;
        }
        if (Cache::has('views' . $id)) {
            $arr['views'] = $this->viewsCount(Cache::get('views' . $id));
        } else {
            $arr['views'] = 0;
        }

        return $arr;
    }
}
