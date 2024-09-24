<?php

require base_path('Validator.php');

$config = require base_path('config.php');
$db = new Database($config ['database']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $validator = new Validator();

    if (!$validator->string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A Body Of Not More Than 1000 Characters is Needed! ';
    }

    if (empty($errors)) {

        $db->query('INSERT INTO notes(body, userid) VALUES (:body, :userid)', [
            ':body' => $_POST['body'],
            ':userid' => 7
        ]);

        header('Location: /notes');
    }

}

view('notes/create.view.php', [
    'heading' => 'Create a Note',
]);