<?php
/**
 * Created by PhpStorm.
 * User: presh
 * Date: 07/04/2019
 * Time: 14:03
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('default/index.html.twig');
    }

}