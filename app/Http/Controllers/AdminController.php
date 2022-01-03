<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Api;

class AdminController extends Controller
{
    public function getDashboard()
    {

        return view('admin.dashboard');
    }

    public function getConfigDomain()
    {
        return view('admin.domain');
    }


    public function getConfigJson(Request $request)
    {
        $modelHash = new Api();
        $hash = $modelHash->hashData()['hash'];
        if ($request->ajax()) {
            $contents = Storage::disk('local')->get('config.json');
            $data = json_decode($contents, true);
            $arr = [];
            foreach ($data as $key => $value) {
                if (array_key_exists($request.'->'.$key, $data)) {
                    continue;
                } else {
                    $arr[$key] = $value;
                }
            }
            foreach ($request->all() as $key => $value) {
                if ($key == '_token') {
                    continue;
                } else {
                    $arr[$key] = $value;
                }
            }
            $json = json_encode($arr);
            Storage::disk('local')->put('config.json', $json);
        } else {

            $content = Storage::disk('local')->get('config.json');
            $data = json_decode($content);
            $prefixForSearch = Storage::disk('local')->get('config-prefix-search.json');
            $prefixSeacrhP = json_decode($prefixForSearch);
            $prefixTrackP = Storage::disk('local')->get('config-prefix-track.json');
            $prefixForTrackP = json_decode($prefixTrackP);
            $postfix = Storage::disk('local')->get('config-postfix.json');
            $postfixForSearch = json_decode($postfix);
            $separator = Storage::disk('local')->get('config-separator.json');
            $separatorForSearch = json_decode($separator);
            if(url()->current() == route('configResults'))
                return view('admin.results', ['data' => $data]);
            elseif(url()->current() == route('configDomain')) {
                return view('admin.domain', ['data' => $data]);
            }
            elseif(url()->current() == route('configCdn')) {
                return view('admin.cdn', ['data' => $data]);
            }
            elseif(url()->current() == route('configHeaders')) {
                return view('admin.headers', ['data' => $data]);
            }
            elseif(url()->current() == route('configSystem')) {
                return view('admin.system', ['data' => $data, 'hash' => $hash]);
            }
            elseif(url()->current() == route('configMainPage')) {
                return view('admin.main-seo', ['data' => $data]);
            }
            elseif(url()->current() == route('configAuthorPage')) {
                return view('admin.author-seo', ['data' => $data]);
            }
            elseif(url()->current() == route('configSearchPage')) {
                return view('admin.search-seo', [
                    'data' => $data,
                    'prefixSeacrhP' => $prefixSeacrhP,
                    ]);
            }
            elseif(url()->current() == route('configNewSearchPage')) {
                return view('admin.search-new-seo', ['data' => $data]);
            }
            elseif(url()->current() == route('configSeoTrackPage')) {
                return view('admin.seo-track', [
                    'data' => $data,
                    'prefixForTrackP' => $prefixForTrackP,
                    'separatorForSearch' => $separatorForSearch,
                    'postfixForSearch' => $postfixForSearch,
                ]);
            }

        }
    }

    public function getConfigGuide()
    {
        $url = url()->current();
        $filename = substr($url, strrpos($url, "/") + 1);
        $contents = Storage::disk('local')->get($filename . '.json');
        $data = json_decode($contents);
        if ($filename == 'config-header-search') {
            return view('admin.header-search', ['data' => $data]);
        } elseif ($filename == 'config-prefix-search') {
            return view('admin.prefix-search', ['data' => $data]);
        } elseif ($filename == 'config-postfix') {
            return view('admin.postfix', ['data' => $data]);
        } elseif ($filename == 'config-prefix-track') {
            return view('admin.prefix-track', ['data' => $data]);
        } elseif ($filename == 'config-separator') {
            return view('admin.separator', ['data' => $data]);
        } elseif ($filename == 'config-header-related') {
            return view('admin.header-related', ['data' => $data]);
        } elseif ($filename == 'config-header-track') {
            return view('admin.header-track', ['data' => $data]);
        }


    }

    public function genJsonConfig(Request $request)
    {
        if ($request->ajax()) {
            $filename = $request->filename;
            $data = [];
            $i = 0;
            foreach ($request->all() as $key => $value) {
                if ($key == '_token') {
                    continue;
                } else {
                    $data[$key] = $value;

                }
            }
            $data = array_unique($data);
            $arr = [];
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                $keyNoNum = preg_replace('/\d/', '', $key);
                $arr[$keyNoNum . $i] = $value;
            }
            $arr['filename'] = $filename;
            $json = json_encode($arr);
            Storage::disk('local')->put($filename . '.json', $json);
            return NULL;


        }
        return view('admin.config-json');
    }

}
