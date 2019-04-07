<?php
/**
 * Created by PhpStorm.
 * User: presh
 * Date: 07/04/2019
 * Time: 15:31
 */

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Rest\Route("/api")
 */
class ApiController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/list")
     * @param Request $request
     * @return Response
     */
    public function list(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $runnings = $em->getRepository('App:Running')->findAll();

        $view = $this->view($runnings, Response::HTTP_OK);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/list/user/{id}")
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function listByUser(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('App:User')->find($id);
        if($user) {
            $runnings = $em->getRepository('App:Running')->findBy(['user' => $user]);

        }

        $view = $this->view($runnings ?? null, Response::HTTP_OK);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/running/{id}")
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function showRunning(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $running = $em->getRepository('App:Running')->find($id);

        $view = $this->view($running ?? null, Response::HTTP_OK);

        return $this->handleView($view);
    }

}