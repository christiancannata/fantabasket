<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DemoBundle\Entity\GiornataReale;
use Acme\DemoBundle\Form\GiornataRealeType;

/**
 * GiornataReale controller.
 *
 * @Route("/giornatareale")
 */
class GiornataRealeController extends Controller
{

    /**
     * Lists all GiornataReale entities.
     *
     * @Route("/", name="giornatareale")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeDemoBundle:GiornataReale')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new GiornataReale entity.
     *
     * @Route("/", name="giornatareale_create")
     * @Method("POST")
     * @Template("AcmeDemoBundle:GiornataReale:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new GiornataReale();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('giornatareale_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a GiornataReale entity.
     *
     * @param GiornataReale $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(GiornataReale $entity)
    {
        $form = $this->createForm(new GiornataRealeType(), $entity, array(
            'action' => $this->generateUrl('giornatareale_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GiornataReale entity.
     *
     * @Route("/new", name="giornatareale_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new GiornataReale();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a GiornataReale entity.
     *
     * @Route("/{id}", name="giornatareale_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:GiornataReale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GiornataReale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing GiornataReale entity.
     *
     * @Route("/{id}/edit", name="giornatareale_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:GiornataReale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GiornataReale entity.');
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
    * Creates a form to edit a GiornataReale entity.
    *
    * @param GiornataReale $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GiornataReale $entity)
    {
        $form = $this->createForm(new GiornataRealeType(), $entity, array(
            'action' => $this->generateUrl('giornatareale_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GiornataReale entity.
     *
     * @Route("/{id}", name="giornatareale_update")
     * @Method("PUT")
     * @Template("AcmeDemoBundle:GiornataReale:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeDemoBundle:GiornataReale')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GiornataReale entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('giornatareale_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a GiornataReale entity.
     *
     * @Route("/{id}", name="giornatareale_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeDemoBundle:GiornataReale')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GiornataReale entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('giornatareale'));
    }

    /**
     * Creates a form to delete a GiornataReale entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('giornatareale_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
