<?php

use Core\App;
use Core\Database;
use Core\Validator;
$db = App::resolve(Database::class);
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

// validate form inputs

$errors = [];
if (!Validator::email($email)){
    $errors["email"] = "Please provide a valid email address!";
}
if (!Validator::string($username, 4, 12)){
    $errors["username"] = "A username of between 4 and 12 characters is required!";
}
if(!Validator::string($password, 7, 255)){
    $errors["password"] = "Please provide a password of at least 7 characters!";
}

if (! empty($errors)){
    return view('registration/create.view.php',[
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account really exist, using email & username

$user = $db->query('SELECT * FROM users WHERE username = :username OR email = :email', [
    'email' => $email,
    'username' => $username
])->find();


if ($user){
    // then someone with that email exists and has an account
//if yes...redirect to the login page.
    $errors["username"] = "Those credentials already exists!";

    return view('registration/create.view.php',[
        'errors' => $errors
    ]);
}
else {
//if no... save one to the database...and log in the user and redirect
    $db->query('INSERT INTO users (email,username, password) VALUES (:email, :username, :password)', [
        'email' => $email,
        'username' => $username,
        'password' => password_hash($password,PASSWORD_BCRYPT) // Never store database password in clear text
    ]);
    // mark that the user has logged in.

    login ($user);
header('Location: /');
exit;
}


