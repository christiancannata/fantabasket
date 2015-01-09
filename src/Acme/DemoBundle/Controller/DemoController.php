<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/nuova-squadra", name="_demo_nuova_squadra")
     * @Template()
     */
    public function nuovaSquadraAction()
    {
        return array();
    }


    /**
     * @Route("/nuova-formazione", name="_demo_formazione")
     * @Template()
     */
    public function nuovaFormazioneAction()
    {
        return array();
    }


    /**
     * @Route("/tua-squadra", name="_demo_squadra")
     * @Template()
     */
    public function tuaSquadraAction()
    {
        return array();
    }


    /**
     * @Route("/tuoi-campionati", name="_demo_campionati")
     * @Template()
     */
    public function tuoiCampionatiAction()
    {
        return array();
    }


    /**
     * @Route("/contact", name="_demo_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $mailer = $this->get('mailer');

            // .. setup a message and send it
            // http://symfony.com/doc/current/cookbook/email.html

            $request->getSession()->getFlashBag()->set('notice', 'Message sent!');

            return new RedirectResponse($this->generateUrl('_demo'));
        }

        return array('form' => $form->createView());
    }
}
