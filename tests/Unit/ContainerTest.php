<?php

use Core\Container;

test('can it resolve something out of a container', function () {
    // arrange
    $container = new Container;

    $container -> bind('foo', fn() => 'foo');

    // act
    $result = $container->resolve('foo');

    //assert/expect
    expect($result)->toEqual('bar');
});
