# Permission #

Modulo composer que gestiona authentication, roles de usuarios y permisos.

## Instalacion y configuracion ##

```
composer require onesla/permission
```

Se debe registrar el Service provider en config/app.php

```
'providers' => [
        ...,
        /*
         * Package Service Providers...
         */
        Onesla\Permission\PermissionServiceProvider::class,
    ],
```

El package trabaja con un archivo de configuraciones por defecto
pero es altamente recomendado crear una copia a nivel de usuario
y sobreescribirlo.

```
php artisan vendor:publish --provider='Onesla\Permission\PermissionServiceProvider'
```

Por defecto permission utiliza tablas pre construidas para gestionar los roles de usuario y permisos
ademas de un perfil administrador pre configurado.

Ejecute una migracion antes de empezar a utilizar el package

```
php artisan migrate --seed
```

## Modo de uso ##

Permission utiliza las siguientes rutas
* user-register [name, email, password],
* login [email, password, remember?]
* profile [name, description, credentials[]]

Para revisar las rutas y los metodos que acepta ejecute el comando artisan
```
php artisan route:list
```

## Middleware ##
Permission utiliza el middleware 'has_access' para checkear si el usuario
con el perfil x y los permisos y[] puede o no acceder a esa ruta,
para poder registrar nuevas credenciales, las rutas deben poseer un nombre.

Para configurar el middleware en la aplicacion se debe resgistar en app/Http/Kernel.php
añadiendolo alfinal de la variable $routeMiddleware

```
protected $routeMiddleware = [
        ...,
        'has_access' => \Onesla\Permission\Http\Middleware\HasAccess::class
    ];
```

## Extra ##

El archivo de configuracion posee la siguiente estructura

```
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
```

* validator: se registran los validadores para las rutas de regsiter, login y profile
* message: mensaje de error cuando falla la authentication
* redirection: par ruta inicio => ruta a redirigir