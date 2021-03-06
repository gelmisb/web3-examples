<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 21/01/2017
 * Time: 15:52
 */

namespace Itb;

use Silex\Application as Silex_Application;

class Application extends Silex_Application
{
    public function __construct()
    {
        parent::__construct();

        $this['debug'] = true;
        
        $this->addRoutes();

        $this->setupTwig();

    }

    public function setupTwig()
    {
        // location of Twig templates
        $myTemplatesPath = __DIR__ . '/../templates';

        // register Twig with Silex
        // ------------
        $this->register(new \Silex\Provider\TwigServiceProvider(),
            [
                'twig.path' => $myTemplatesPath
            ]
        );

    }

    public function addRoutes()
    {
        //----------- map 'routes' to controller 'actions' -----------
        // main routes
        $this->get('/',        'Itb\MainController::indexAction');
        $this->get('/contact', 'Itb\MainController::contactAction');

        // hello routes
        $this->get('/hello',        'Itb\HelloController::indexAction');
        $this->get('/hello/{name}', 'Itb\HelloController::nameAction');

    }

}