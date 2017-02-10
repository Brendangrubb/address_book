<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Contact.php';

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path'=>__DIR__.'/../views')
    );

    $app->get('/', function() use ($app){

        return $app['twig']->render('address_book_home.html.twig');
    });

    $app->post('/add_a_contact', function() use ($app){

        return $app['twig']->render('add_a_contact.html.twig');
    });

    $app->post('/delete_all_contacts', function() use ($app){

        return $app['twig']->render('delete_all_contacts.html.twig');
    });

    return $app;
?>
