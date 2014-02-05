<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('cruz_todo_homepage', new Route('/hello/{name}', array(
    '_controller' => 'CruzTodoBundle:Default:index',
)));

$collection->add('create', new Route('/create/', array(
    '_controller' => 'CruzTodoBundle:Post:create',
)));

return $collection;