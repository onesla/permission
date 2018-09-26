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
        ]
    ],
    'message' => [
        'auth_fail' => 'Incorrect Email or Password'
    ]
];
