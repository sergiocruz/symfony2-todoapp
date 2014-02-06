<?php

namespace Cruz\TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Cruz\TodoBundle\Entity\Todo;

class DefaultController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function indexAction($name = null)
    {
        return $this->render('TodoBundle:Default:index.html.twig');
    }
}
