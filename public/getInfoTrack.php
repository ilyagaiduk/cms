<?php
$link = MySQLi_connect("localhost", "soundcloud_api", "x6c3uDFw31", "soundcloud_api")
or die("<h3>Ошибка подключения к базе данных" . mySQLi_error() . "</h3>");
$selectID = MySQLi_query($link, "SELECT * FROM `tracks` WHERE status=0 GROUP BY trackid LIMIT 2;");
$arrStatus = [];
function replace($value)
{
    $search = array('"', "'");
    $replace = array('\"', '\'');
    $value = str_replace($search, $replace, $value);
    return $value;
}

$row_count = MySQLi_num_rows($selectID);
if ($row_count == 0) {
    exit;
} else {
    while ($idRows = MySQLi_fetch_assoc($selectID)) {
        $id = $idRows['trackid'];
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                    "Cookie: foo=bar\r\n"
            )
        );
        $context = stream_context_create($opts);
// Открываем файл с помощью установленных выше HTTP-заголовков
        $url = 'http://mp3api.org/track?id=' . $id . '&hash=DQYBHODN5VsRlriLb9qP7Gdec10NX3UmZiuTOWJ7WaA7X4kns.OJTNyTvNQ--';
        $header = get_headers($url);
        if ($header[0] != 'HTTP/1.1 200 OK') {
            $arrStatus[$id] = 2;
            continue;
        }
        $json = file_get_contents($url, false, $context);
        $result = json_decode($json);
        $title = replace($result->title);
        $duration = $result->duration;
        $created_at = $result->created_at;
        $tag_list = replace($result->tag_list);
        $artist = replace($result->artist);
        $arr = [];
        $trackid = $id;
        if (!isset($title)) {
            $title = 0;
        }
        if (!isset($duration)) {
            $duration = 0;
        }
        if (!isset($created_at)) {
            $created_at = 0;
        }
        if (!isset($tag_list)) {
            $tag_list = 0;
        }
        if (!isset($artist)) {
            $artist = 0;
        }
        $insert = MySQLi_query($link, "INSERT INTO `infotrack`(`trackid`, `title`, `duration`, `created_at`, `tag_list`, `artist`)
 VALUES ('$trackid', '$title', '$duration', '$created_at', '$tag_list', '$artist');");
//        $columns = [];
//        $insData = [];
//        foreach ($arr as $key => $value) {
//            $columns[] = '`'.$key.'`';
//            $search = '"';
//            $replace = '\"';
//            $value = str_replace($search, $replace, $value);
//            $insData[] = $value;
//        }
//        $columns = implode(", ", array_keys($insData));
//        $escaped_values = array_map('mysql_real_escape_string', array_values($insData));
//        $values = implode("', '", $escaped_values);
//        $insert = MySQLi_query($link, "INSERT INTO `infotrack`($columns) VALUES ($values);");
        $arrStatus[$id] = 1;
//    }

        foreach ($arrStatus as $key => $value) {
            $updateStatus = MySQLi_query($link, "UPDATE `tracks` SET status = '$value' WHERE trackid = '$key';");
        }
    }
}
