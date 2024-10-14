<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::container()->resolve('Core\Database');

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// errors exist, show to user
if (!empty($errors)) {
    //validation issue
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);

}

// passed with no errors, save note

$db->query('INSERT INTO notes(body, userid) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1
]);



header('location: /notes');


