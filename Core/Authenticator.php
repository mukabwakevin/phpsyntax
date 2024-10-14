<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $username, $password)
    {
        $users = App::resolve(Database::class)->query('select * from users where email = :email OR username = :username', [
            'email' => $email,
            'username' => $username
        ])->find();

        if ($users) {

            if (password_verify($password, $users["password"]))
            {
                $this->login([
                    'email' => $email,
                ]);

                return true;
            }

        }
        return false;

    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        session_regenerate_id(true);
    }

    public function logout()
    {
        // log the user out.
        Session::destroy();
    }
}