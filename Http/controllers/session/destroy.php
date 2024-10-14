<?php

use Core\Authenticator;
use Core\Middleware\Auth;

(new Authenticator())->logout();

header('location: /');
exit();