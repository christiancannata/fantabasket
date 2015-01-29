<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DemoBundle\Entity\SquadraReale;
use Acme\DemoBundle\Form\SquadraRealeType;

/**
 * SquadraReale controller.
 *
 * @Route("/squadrareale")
 */
class SquadraRealeController extends Controller
{

    /**
     * Lists all SquadraReale entities.
     *
     * @Route("/", name="squadrareale")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeDemoBundle:SquadraReale')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SquadraReale entity.
     *
     * @Route("/", name="squadrareale_create")
     * @Method("POST")
     * @Template("AcmeDemoBundle:SquadraReale:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SquadraReale();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('squadrareale_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a SquadraReale entity.
     *
     * @param SquadraReale $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SquadraReale $entity)
    {
        $form = $this->createForm(new SquadraRealeType(), $entity, array(
            'action' => $this->generateUrl('squadrareale_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SquadraReale entity.
     *
     * @Route("/new", name="squadrareale_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SquadraReale();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SquadraReale entity.
     *
     * @Route("/{id}", name="squadrareale_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:SquadraReale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SquadraReale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SquadraReale entity.
     *
     * @Route("/{id}/edit", name="squadrareale_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:SquadraReale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SquadraReale entity.');
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
    * Creates a form to edit a SquadraReale entity.
    *
    * @param SquadraReale $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SquadraReale $entity)
    {
        $form = $this->createForm(new SquadraRealeType(), $entity, array(
            'action' => $this->generateUrl('squadrareale_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SquadraReale entity.
     *
     * @Route("/{id}", name="squadrareale_update")
     * @Method("PUT")
     * @Template("AcmeDemoBundle:SquadraReale:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:SquadraReale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SquadraReale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('squadrareale_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SquadraReale entity.
     *
     * @Route("/{id}", name="squadrareale_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeDemoBundle:SquadraReale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SquadraReale entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('squadrareale'));
    }

    /**
     * Creates a form to delete a SquadraReale entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('squadrareale_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
