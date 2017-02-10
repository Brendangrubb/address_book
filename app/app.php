<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Contact.php';

    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path'=>__DIR__.'/../views')
    );

    $app->get('/', function() use ($app){
        $all_contacts = Contact::getAll();

        return $app['twig']->render('address_book_home.html.twig', array('all_contacts' => $all_contacts));
    });

    $app->post('/add_a_contact', function() use ($app){

        $new_contact = new Contact(
            $_POST['name'],
            $_POST['number'],
            $_POST['address']
        );
        $new_contact->save();

        return $app['twig']->render('add_a_contact.html.twig', array('new_contact' => $new_contact));
    });

    $app->post('/delete_all_contacts', function() use ($app){
        Contact::deleteAll();
        return $app['twig']->render('delete_all_contacts.html.twig');
    });

    return $app;
?>
