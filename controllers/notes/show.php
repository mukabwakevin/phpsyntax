<?php

$config = require base_path('config.php');
$db = new Database($config ['database']);

$heading = 'Note';
$currentUserid = 7;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['userid'] == $currentUserid);

require base_path('views/notes/show.view.php');