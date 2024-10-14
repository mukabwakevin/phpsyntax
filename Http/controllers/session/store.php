<?php

// log in the user if credentials match

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attribute = [
    'email' => $_POST['email'],
    'username' => $_POST['username'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt($attribute['email'], $attribute['username'], $attribute['password']);

if (!$signedIn) {
    $form->error('email', 'No matching account found for that email address and password!')
        ->throw();
}
redirect('/');


// return view('session/create.view.php', [
// 'errors' => $form->errors()
// ]);

// match the credentials
// we have a user, but we don't know if the password provided matches what we have in the database.
