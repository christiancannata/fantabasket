<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DemoBundle\Entity\Giocatore;
use Acme\DemoBundle\Form\GiocatoreType;

/**
 * Giocatore controller.
 *
 * @Route("/giocatore")
 */
class GiocatoreController extends Controller
{

    /**
     * Lists all Giocatore entities.
     *
     * @Route("/", name="giocatore")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeDemoBundle:Giocatore')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Giocatore entity.
     *
     * @Route("/", name="giocatore_create")
     * @Method("POST")
     * @Template("AcmeDemoBundle:Giocatore:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Giocatore();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('giocatore_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Giocatore entity.
     *
     * @param Giocatore $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Giocatore $entity)
    {
        $form = $this->createForm(new GiocatoreType(), $entity, array(
            'action' => $this->generateUrl('giocatore_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Giocatore entity.
     *
     * @Route("/new", name="giocatore_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Giocatore();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Giocatore entity.
     *
     * @Route("/{id}", name="giocatore_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Giocatore')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Giocatore entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Giocatore entity.
     *
     * @Route("/{id}/edit", name="giocatore_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Giocatore')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Giocatore entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Giocatore entity.
    *
    * @param Giocatore $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Giocatore $entity)
    {
        $form = $this->createForm(new GiocatoreType(), $entity, array(
            'action' => $this->generateUrl('giocatore_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Giocatore entity.
     *
     * @Route("/{id}", name="giocatore_update")
     * @Method("PUT")
     * @Template("AcmeDemoBundle:Giocatore:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Giocatore')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Giocatore entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('giocatore_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Giocatore entity.
     *
     * @Route("/{id}", name="giocatore_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeDemoBundle:Giocatore')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Giocatore entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('giocatore'));
    }

    /**
     * Creates a form to delete a Giocatore entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('giocatore_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
