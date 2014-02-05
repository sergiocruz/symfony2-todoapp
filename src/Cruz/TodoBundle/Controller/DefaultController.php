<?php

namespace Cruz\TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CruzTodoBundle:Default:index.html.twig', array('name' => $name));
    }
}
