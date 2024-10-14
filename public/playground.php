<?php

use illuminate\Support\Collection;

require __DIR__.'/../vendor/autoload.php';

$numbers = new Collection([
    1, 2, 3
]);

die(var_dump($numbers));