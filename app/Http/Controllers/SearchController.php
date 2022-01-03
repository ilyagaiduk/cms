<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Memcache;
use App\Api;
use App\Paginate;
use App\Config;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Player;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function likesRelated($items, $page)
    {
        if(empty($page)) {
            $page = 0;
        }
        else {
            $page = $page -1;
        }
        $likes = [];
        foreach ($items as $key => $value) {
            if ($key == $page) {
                foreach ($value as $newKey => $newValue) {
                    if ($newKey != 'total') {
                        preg_match('/tracks\/([^&]*)/', $newValue->track, $matches);
                        $search = 'tracks/';
                        $replace = '';
                        $id = str_replace($search, $replace, $matches[0]);
                        $model = new Memcache();
                        $likes[$id] = $model->getLikes($id);
                    }
                }
            }
        }
        return $likes;
    }



    public function search(Request $request)
    {
        if ($request->ajax()) {
            $urlId = $request->urlId;
            $count = $request->count;
            $id = $request->id;
            $countSecond = $request->countSecond;
            $modelLike = new Memcache();
            $recordLike = $modelLike->likes($urlId, $count, $id, $countSecond, $request);
            return view('site.like', ['urlId' => $urlId, 'count' => $count, 'id' => $id, 'recordLike' => $recordLike]);
        }
        $modelConfig = new Config();
        $prefix = $modelConfig->forRedirect()['prefixSearch'];
        $prefixTrack = $modelConfig->forRedirect()['prefixForTrackP'];
        $separatorTrack = $modelConfig->forRedirect()['separatorForSearchSP'];
        $postfixTrack = $modelConfig->forRedirect()['postfixForSearchSP'];
        $tumbSize = $modelConfig->forRedirect()['sizeTumbSiteS'];
        if (strpos(url()->current(), $prefix . "/")) {
            $search = [$prefix . "/"];
            $replace = [''];
            $s = str_replace($search, $replace, request()->path());
        } else {
            $s = $request->get('s'); // получаем поисковый запрос.
        }
        $modelApi = new Api();
        $s = $modelApi->HandlerQuery($s);
        $model = new Memcache();
        $recordQuery = $model->cacheQuery($s);
        $configQueries = 3;//задаем этот параметр в конфиге
        $related = array_slice($recordQuery, -$configQueries, $configQueries, true);//получаем последние три элемента
        $reverse = array_reverse($related);// получаем значения в обратном порядке

        $arrTrack = [
            'prefix' => $prefixTrack,
            'separator' => $separatorTrack,
            'postfix' => $postfixTrack,
        ];
        if (!empty($s || strpos(url()->current(), $prefix . "/"))) {
            $url = $request->url();
            $currPagePag = $request->get('page');
            $modelPaginate = new Paginate();

            if (!empty($currPagePag)) { //если есть пагинация

                $items = $modelApi->getApi($s, $currPagePag); //получаем результат запроса api в виде массива
            } else {
                $currPagePag = 1;
                $items = $modelApi->getApi($s, $currPagePag);

            }
            $likes = $this->likesRelated($items, $request->get('page'));
            $resultsApi = $modelPaginate->getPaginate($s, $items, $currPagePag, $url);
            return view('site.search', ['related' => $reverse, 'api' => $resultsApi, 'p' => $currPagePag,
                'forTrack' => $arrTrack, 'likes' => $likes, 'tumbSize' => $tumbSize]);
        } else {
            $resultsApi = null;
            $currPagePag = null;
            return view('site.search', ['related' => $reverse, 'api' => $resultsApi, 'p' => $currPagePag,
                'forTrack' => $arrTrack, 'tumbSize' => $tumbSize]);
        }
    }

    public function player()
    {
        $modelConfig = new Config();
        $prefixSearch = $modelConfig->forRedirect()['prefixSearch'];
        $prefix = $modelConfig->forRedirect()['prefixForTrackP'];
        $separator = $modelConfig->forRedirect()['separatorForSearchSP'];
        $postfix = $modelConfig->forRedirect()['postfixForSearchSP'];
        $countTags = $modelConfig->forRedirect()['countTagsSTP'];
        $countRelated = $modelConfig->forRedirect()['countRelatedSTP'];
        $url = url()->current();
        $id = substr($url, strrpos($url, $separator) + 1);
        $search = $postfix;
        $replace = '';
        $id = str_replace($search, $replace, $id);
        $modelMemcache = new Memcache();
        $voites = $modelMemcache->getVoites($id);
        $modelApi = new Api();
        $getApi = $modelApi->getApiTrack($id);
        $modelPlayer = new Player();
        $tags = $modelPlayer->tags($getApi);
        $days = $modelPlayer->date($getApi);
        $artist = $modelPlayer->artist($getApi);
        $title = $modelPlayer->title($getApi);
        $queryForRelated = $modelPlayer->getQueryForRelated($tags, $artist, $title);
        $p = 1;
        $resultsApi = $modelApi->getApi($queryForRelated, $p);
        $page = null;
        $likes = $this->likesRelated($resultsApi, $page);
        $relatedTracks = $modelPlayer->getRelated($resultsApi);
        return view('site.player', [
            'api' => $getApi,
            'tags' => $tags,
            'date' => $days,
            'prefix' => $prefixSearch,
            'countTags' => $countTags,
            'relatedTracks' => $relatedTracks,
            'id' => $id,
            'voites' => $voites,
            'likes' => $likes,
            'countRelated' => $countRelated,
        ]);
    }
}
