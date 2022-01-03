<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Paginate extends Model
{
    public function getPaginate($s, $items, $currPagePag, $url)
    {
        $total = count($items);
        $per_page = 1;
        $current_page = $currPagePag ?? 1;

        $starting_point = ($current_page * $per_page) - $per_page;

        $array = array_slice($items, $starting_point, $per_page, true);
        $result = new Paginator($array, $total, $per_page, $current_page, [
            'path' => $url,
            'query' => $s,
        ]);
        return $result;
    }

}
