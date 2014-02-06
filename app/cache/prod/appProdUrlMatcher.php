<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // cruz_todo_default_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'cruz_todo_default_index');
            }

            return array (  'name' => NULL,  '_controller' => 'Cruz\\TodoBundle\\Controller\\DefaultController::indexAction',  '_route' => 'cruz_todo_default_index',);
        }

        if (0 === strpos($pathinfo, '/api')) {
            // cruz_todo_api_index
            if (rtrim($pathinfo, '/') === '/api') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cruz_todo_api_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'cruz_todo_api_index');
                }

                return array (  '_controller' => 'Cruz\\TodoBundle\\Controller\\ApiController::indexAction',  '_route' => 'cruz_todo_api_index',);
            }
            not_cruz_todo_api_index:

            // cruz_todo_api_get
            if (preg_match('#^/api(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cruz_todo_api_get;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cruz_todo_api_get')), array (  'id' => NULL,  '_controller' => 'Cruz\\TodoBundle\\Controller\\ApiController::getAction',));
            }
            not_cruz_todo_api_get:

            // cruz_todo_api_post
            if ($pathinfo === '/api/new') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_cruz_todo_api_post;
                }

                return array (  '_controller' => 'Cruz\\TodoBundle\\Controller\\ApiController::postAction',  '_route' => 'cruz_todo_api_post',);
            }
            not_cruz_todo_api_post:

            // cruz_todo_api_put
            if (preg_match('#^/api(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_cruz_todo_api_put;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cruz_todo_api_put')), array (  'id' => NULL,  '_controller' => 'Cruz\\TodoBundle\\Controller\\ApiController::putAction',));
            }
            not_cruz_todo_api_put:

            // cruz_todo_api_delete
            if (preg_match('#^/api(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_cruz_todo_api_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cruz_todo_api_delete')), array (  'id' => NULL,  '_controller' => 'Cruz\\TodoBundle\\Controller\\ApiController::deleteAction',));
            }
            not_cruz_todo_api_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
