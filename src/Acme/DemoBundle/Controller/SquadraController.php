<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DemoBundle\Entity\Squadra;
use Acme\DemoBundle\Form\SquadraType;

/**
 * Squadra controller.
 *
 * @Route("/squadra")
 */
class SquadraController extends Controller
{

    /**
     * Lists all Squadra entities.
     *
     * @Route("/", name="squadra")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeDemoBundle:Squadra')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Squadra entity.
     *
     * @Route("/", name="squadra_create")
     * @Method("POST")
     * @Template("AcmeDemoBundle:Squadra:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Squadra();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('squadra_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Squadra entity.
     *
     * @param Squadra $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Squadra $entity)
    {
        $form = $this->createForm(new SquadraType(), $entity, array(
            'action' => $this->generateUrl('squadra_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Squadra entity.
     *
     * @Route("/new", name="squadra_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Squadra();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Squadra entity.
     *
     * @Route("/{id}", name="squadra_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Squadra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Squadra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Squadra entity.
     *
     * @Route("/{id}/edit", name="squadra_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Squadra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Squadra entity.');
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
    * Creates a form to edit a Squadra entity.
    *
    * @param Squadra $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Squadra $entity)
    {
        $form = $this->createForm(new SquadraType(), $entity, array(
            'action' => $this->generateUrl('squadra_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Squadra entity.
     *
     * @Route("/{id}", name="squadra_update")
     * @Method("PUT")
     * @Template("AcmeDemoBundle:Squadra:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:Squadra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Squadra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('squadra_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Squadra entity.
     *
     * @Route("/{id}", name="squadra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeDemoBundle:Squadra')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Squadra entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('squadra'));
    }

    /**
     * Creates a form to delete a Squadra entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('squadra_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
