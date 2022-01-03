<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Player extends Model
{
    public function tags($getApi)
    {
        if (isset($getApi->tag_list)) {
            $tags = $getApi->tag_list;
            $tags = explode(' ', $tags);
            $arrTags = [];
            foreach ($tags as $value) {
                $value = preg_replace('/\W+/', '', $value);
                if (mb_strlen($value, 'utf-8') < 3) {
                    continue;
                }
                $arrTags[] = $value;
            }
        } else {
            $arrTags = null;
        }
        return $arrTags;
    }

    public function date($getApi)
    {
        $date = Carbon::createMidnightDate($getApi->created_at);
        $dateNow = Carbon::createMidnightDate('now');
        $diffDate = $date->diffInDays($dateNow);
        $diffHours = $date->diffInHours($dateNow);
        if ($diffDate < 7) {
            $days = $diffDate . " " . Str::plural('day', $diffDate) . " ago";
        } elseif ($diffDate >= 7 && $diffDate <= 30) {
            $days = floor($diffDate / 7) . " " . Str::plural('week', $diffDate) . " ago";
        } elseif ($diffDate > 30 && $diffDate < 365) {
            $days = floor($diffDate / 30) . " " . Str::plural('month', $diffDate) . " ago";
        } elseif ($diffDate >= 365) {
            $days = floor($diffDate / 365) . " " . Str::plural('year', $diffDate) . " ago";
        }
        return $days;
    }

    public function artist($getApi)
    {
        if (!empty($getApi->artist)) {
            $artist = $getApi->artist;
            $artist = preg_replace('/\W+/', '-', $artist);
        } else {
            $artist = null;
        }
        return $artist;
    }

    public function title($getApi)
    {
        if (isset($getApi->title)) {
            $title = $getApi->title;
            $title = preg_replace('/\W+/', '-', $title);
        } else {
            $title = null;
        }
        return $title;
    }

    public function getQueryForRelated($tags, $artist, $title)
    {
        if (!empty($artist)) {
            return $artist;
        } else {
            if (isset($tags)) {
                return $tags[0];
            } elseif (isset($title)) {
                return $title;
            } else {
                return null;
            }
        }
    }

    public function getRelated($results)
    {
        if (!empty($results)) {
            $arr = [];
            $i = 0;
            foreach ($results[0] as $keyResults => $valueResults) {
                if ($keyResults == 'total') {
                    continue;
                } else {
                    $i++;
                    $arr[$i]['track'] = $valueResults->track;
                    $arr[$i]['picture'] = $valueResults->picture;
                    $arr[$i]['titleLink'] = $this->title($valueResults);
                    $arr[$i]['title'] = $valueResults->title;
                    $arr[$i]['duration'] = $valueResults->duration;
                }
            }
            return $arr;
        }
        return null;
    }
}

