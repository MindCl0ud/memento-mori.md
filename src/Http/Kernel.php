<?php
protected $routeMiddleware = [
    // Baris lainnya...
    'validate.url' => \src\Http\Middleware\ValidateUrl::class,
];

?>