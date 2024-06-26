<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'admin' => \Middlewares\AdminSysMiddleware::class,
    ],
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'specialSymbols' => \Validators\SpecSymbolsValidator::class,
    ],
    'routeAppMiddleware' => [
        'csrf' => Middlewares\CSRFMiddleware::class,
        'trim' => Middlewares\SpecialCharsMiddleware::class,
        'specialChars' => Middlewares\TrimMiddleware::class,
    ],


];
