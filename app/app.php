<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());   // définit $app['app']
$app->register(new Silex\Provider\TwigServiceProvider(), array( // définit $app['twig']
    'twig.path' => __DIR__.'/../views',
));

// Register services.
$app['dao.article'] = $app->share(function ($app) {
    return new MicroCMS\DAO\ArticleDAO($app['db']);
});