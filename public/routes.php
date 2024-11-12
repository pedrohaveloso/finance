<?php

return [
    'external' => [
        '/' => 'Auth@login',
        '/register' => 'Auth@register'
    ],
    'internal' => [
        '/logout' => 'Auth@logout',

        '/home' => 'Home@index'
    ]
];
