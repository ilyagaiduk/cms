<?php
//параметры запроса
$query = 'sting';
$variant_ids = '2249';
$facet = 'model';
$user_id = '833379-470240-564873-825439';
$client_id = 'UtkUvYEcoja1Cc6AD5OPyD35KtC1N4K7';
$limit = 20;
$offcet = 0;
$linked_partitioning = 1;
$app_version = '1618904955';
$locale = 'en';
//отправляем запрос
$opts = array(
    'http' => array(
        'method' => "GET",
        'header' => "Accept-language: en\r\n" .
            "Cookie: foo=bar\r\n"
    )
);
$context = stream_context_create($opts);
// Открываем файл с помощью установленных выше HTTP-заголовков

$json = file_get_contents('https://api-v2.soundcloud.com/search?q=' . $query . '&variant_ids=' . $variant_ids . '&facet=' . $facet . '&user_id=' . $user_id . '&client_id=' . $client_id . '&limit=' . $limit . '&offset=' . $offcet . '&linked_partitioning=' . $linked_partitioning . '&app_version=' . $app_version . '&app_locale=' . $locale . '', false, $context);
$obj = json_decode($json);
//парсим картинки
function GetImageFromUrl($link) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch,CURLOPT_URL,$link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($ch);
    curl_close($ch);
    return $result;
}
//обрабатываем ответ
for($i = 1; $i < $limit; $i++) {
    $id = $obj->collection[$i]->id; //id трека
    $image = $obj->collection[$i]->artwork_url; //url картинки
    if($image != null) {
        $extension = pathinfo(parse_url($image, PHP_URL_PATH), PATHINFO_EXTENSION); //получаем расширение картинки
        $pathToCache = '/home/soundcloud/web/soundcloud/img/'; //путь до начального каталога с картинками
        $firstDir = str_pad(intval($id / 1000000), 3, '0', STR_PAD_LEFT); //название первого каталога
        $secondDir = str_pad(intval(($id - ($firstDir * 1000000)) / 1000), 3, '0', STR_PAD_LEFT); //название второго каталога
        if (!mkdir($pathToCache . "/" . $firstDir . "/" . $secondDir, 0777, true)) { //создание каталогов
            die('Не удалось создать директории...');
        }
        $imageFile = $pathToCache . $firstDir . '/' . $secondDir . '/' . $id . '.' . $extension; //новое имя файла
        $sourceImage = GetImageFromUrl($image); //загружаем картинку
        $savefile = fopen($imageFile, 'w');
        fwrite($savefile, $imageFile); //записываем с новым названием
        fclose($savefile);
    }
    }
