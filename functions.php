<?php
function dd($value){
echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI']===$value;
}

function authorize($condition,$status = response::FORBIDDEN)
{
    if (! $condition) {
        abort ($status);
    }
}

function base_path($path)
{
    // .../phpsyntax/(#var)
    return BASE_DIR . $path;
}

function view($view, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $view);
}

