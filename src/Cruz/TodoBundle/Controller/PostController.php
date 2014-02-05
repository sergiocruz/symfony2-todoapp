<?php

namespace Cruz\TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration;

/**
 * @Route("/post")
 */
class PostController extends Controller
{
	/**
	 * @Route("/create/{id}", name="create", defaults={"id" = null})
	 */
    public function createAction($id)
    {
    	// die ('create: ' . $id);
    	return $this->render('CruzTodoBundle:Post:create.html.twig', array('id' => $id));
    }

}
