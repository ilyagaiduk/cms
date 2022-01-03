<?php

    $memcache = new Memcache;
    $connect = $memcache->connect('unix:///var/run/memcached/memcached.sock', 0);

    echo var_dump($connect);
    exit;