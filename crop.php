<?php

    $time = microtime(true);

    $originalImgUrl = '/home/soundcloud/web/pictures/330745490.jpg';

    $originalDir = str_replace('.jpg', '', $originalImgUrl);

    $command = '/usr/bin/convert '.$originalImgUrl.' -resize 400x300^ -gravity center -extent 400x300 '.$originalDir . '400x300.jpg';
    exec($command);

    $command = '/usr/bin/convert '.$originalImgUrl.' -resize 320x180^ -gravity center -extent 320x180 '.$originalDir . '320x180.jpg';
    exec($command);

    $command = '/usr/bin/convert '.$originalImgUrl.' -resize 300x225^ -gravity center -extent 300x225 '.$originalDir . '300x225.jpg';
    exec($command);

    $command = '/usr/bin/convert '.$originalImgUrl.' -resize 400x225^ -gravity center -extent 400x225 '.$originalDir . '400x225.jpg';
    exec($command);

    $command = '/usr/bin/convert '.$originalImgUrl.' -resize 273x153^ -gravity center -extent 273x153 '.$originalDir . '273x153.jpg';
    exec($command);

    $command = '/usr/bin/convert '.$originalImgUrl.' -resize 320x240^ -gravity center -extent 320x240 '.$originalDir . '320x240.jpg';
    exec($command);

    $time = microtime(true) - $time;

    echo 'time: ' . $time . ' sec';
    exit;