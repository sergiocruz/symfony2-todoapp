<?php

namespace Cruz\TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration;

/**
 * @Route("/")
 */
class PostController extends Controller
{
	/**
	 * @Route("/")
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$todo = $em->getRepository('CruzTodoBundle:Todo');

		// print_r($todo);
		// exit;

		return $this->render('CruzTodoBundle:Post:index.html.twig');
	}

	/**
	 * @Route("/create/{id}", name="create", defaults={"id" = null})
	 */
    public function createAction($id)
    {
    	// die ('create: ' . $id);
    	return $this->render('CruzTodoBundle:Post:create.html.twig', array('id' => $id));
    }

}
