<?php

namespace Facile\Adsl\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FacileAdslAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
