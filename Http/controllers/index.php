<?php

$_SESSION['name'] = 'Kevin';

view("index.view.php", [
    'heading' => 'Home',
]);