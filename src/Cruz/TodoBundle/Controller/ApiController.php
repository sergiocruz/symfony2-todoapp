<?php

namespace Cruz\TodoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\JsonResponse;

use Cruz\TodoBundle\Entity\Todo;

use Cruz\TodoBundle\Form\TodoType;

class ApiController extends Controller
{
    /**
     * @Route("")
     * @Method("GET")
     */
    public function indexAction()
    {
        // TODO: Implement init() method to instanciate $repository in this controller
        $repository = $this->getDoctrine()->getRepository('TodoBundle:Todo');

        $todos = $repository->findAll();

        $response = new JsonResponse();
        $response->setData($todos);

        return $response;
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function getAction($id = null)
    {
        // TODO: Implement init() method to instanciate $repository in this controller
        $repository = $this->getDoctrine()->getRepository('TodoBundle:Todo');

        $response = new JsonResponse();

        $todo = $repository->find($id);

        // Handle not found
        if (!$todo)
        {
            $response->setStatusCode(JsonResponse::HTTP_NOT_FOUND);
            return $response;
        }

        // Sets data with "todo"
        $response->setData($todo);

        return $response;
    }

    /**
     * // Stupid trailing slash issue (can't get "/" to work when its a post request)
     * @Route("/new")
     * @Method("POST")
     */
    public function postAction()
    {
        // Response object
        $response = new JsonResponse();

        // TODO: Optimize validation and optimization this maybe by using forms?

        // Request & input fields
        $request = $this->get('request')->request;
        $todoText = $request->get('text');
        $todoCompleted = $request->get('completed');

        if (!$todoText || $todoCompleted === null)
        {
            $response->setStatusCode(JsonResponse::HTTP_BAD_REQUEST);
            return $response;
        }

        // New todo
        $todo = new Todo();
        $todo->setText($todoText);
        $todo->setCompleted((bool)$todoCompleted);

        // Persists todo to DB
        $em = $this->getDoctrine()->getManager();
        $em->persist($todo);
        $em->flush();

        // Returns json encoded todo
        $response->setData($todo);

        return $response;
    }

    /**
     * @Route("/{id}")
     * @Method("PUT")
     */
    public function putAction($id = null)
    {
        // Response object
        $response = new JsonResponse();

        // DB Resository
        $repository = $this->getDoctrine()->getRepository('TodoBundle:Todo');

        // Look for todo
        $todo = $repository->find($id);

        // If todo wasnt found, then return 404
        if (!$todo)
        {
            $response->setStatusCode(JsonResponse::HTTP_NOT_FOUND);
            return $response;
        }

        // TODO: Optimize validation and optimization this maybe by using forms?

        // Request & input fields
        $request = $this->get('request')->request;
        $todoText = $request->get('text');
        $todoCompleted = $request->get('completed');

        if (!$todoText || $todoCompleted === null)
        {
            $response->setStatusCode(JsonResponse::HTTP_BAD_REQUEST);
            return $response;
        }

        // Updates todo
        $todo->setText($todoText);
        $todo->setCompleted($todoCompleted);

        // Persists data todo in DB
        $em = $this->getDoctrine()->getManager();
        $em->persist($todo);
        $em->flush();

        // Sets new todo in response
        $response->setData($todo);

        return $response;
    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function deleteAction($id = null)
    {
        // Response object
        $response = new JsonResponse();

        // DB Resository
        $repository = $this->getDoctrine()->getRepository('TodoBundle:Todo');

        // Look for todo
        $todo = $repository->find($id);

        // If todo wasnt found, then return 404
        if (!$todo)
        {
            $response->setStatusCode(JsonResponse::HTTP_NOT_FOUND);
            return $response;
        }

        // Persists todo to DB
        $em = $this->getDoctrine()->getManager();
        $em->remove($todo);
        $em->flush();

        return $response;
    }

}
