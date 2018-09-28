<?php

return [
    'validator' => [
        'register' => [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ],
        'login' => [
            'email' => 'required|email',
            'password' => 'required'
        ],
        'profile' => [
            'name' => 'required',
            'description' => 'required',
            'credentials' => 'required'
        ]
    ],
    'message' => [
        'auth_fail' => 'Incorrect Email or Password'
    ],
    'redirection' => [
        'register' => 'login',
        'profile' => '',
        'user' => ''
    ]
];
