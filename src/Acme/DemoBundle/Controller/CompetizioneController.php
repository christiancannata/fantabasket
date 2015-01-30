<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DemoBundle\Entity\Competizione;
use Acme\DemoBundle\Form\CompetizioneType;

/**
 * Competizione controller.
 *
 * @Route("/competizione")
 */
class CompetizioneController extends Controller {

	/**
	 * Lists all Competizione entities.
	 *
	 * @Route("/", name="competizione")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction() {
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository( 'AcmeDemoBundle:Competizione' )->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Creates a new Competizione entity.
	 *
	 * @Route("/", name="competizione_create")
	 * @Method("POST")
	 * @Template("AcmeDemoBundle:Competizione:new.html.twig")
	 */
	public function createAction( Request $request ) {
		$entity = new Competizione();
		$form   = $this->createCreateForm( $entity );
		$form->handleRequest( $request );

		if ( $form->isValid() ) {
			$em = $this->getDoctrine()->getManager();
			$em->persist( $entity );
			$em->flush();

			return $this->redirect( $this->generateUrl( 'competizione_show', array( 'id' => $entity->getId() ) ) );
		}

		return array(
			'entity' => $entity,
			'form'   => $form->createView(),
		);
	}

	/**
	 * Creates a form to create a Competizione entity.
	 *
	 * @param Competizione $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm( Competizione $entity ) {
		$form = $this->createForm( new CompetizioneType(), $entity, array(
			'action' => $this->generateUrl( 'competizione_create' ),
			'method' => 'POST',
		) );

		$form->add( 'submit', 'submit', array( 'label' => 'Create' ) );

		return $form;
	}

	/**
	 * Displays a form to create a new Competizione entity.
	 *
	 * @Route("/new", name="competizione_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction() {
		$entity = new Competizione();
		$form   = $this->createCreateForm( $entity );

		return array(
			'entity' => $entity,
			'form'   => $form->createView(),
		);
	}

	/**
	 * Finds and displays a Competizione entity.
	 *
	 * @Route("/{id}", name="competizione_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction( $id ) {
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository( 'AcmeDemoBundle:Competizione' )->find( $id );

		if ( ! $entity ) {
			throw $this->createNotFoundException( 'Unable to find Competizione entity.' );
		}

		$deleteForm = $this->createDeleteForm( $id );

		return array(
			'entity'      => $entity,
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Displays a form to edit an existing Competizione entity.
	 *
	 * @Route("/{id}/edit", name="competizione_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction( $id ) {
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository( 'AcmeDemoBundle:Competizione' )->find( $id );

		if ( ! $entity ) {
			throw $this->createNotFoundException( 'Unable to find Competizione entity.' );
		}

		$editForm   = $this->createEditForm( $entity );
		$deleteForm = $this->createDeleteForm( $id );

		return array(
			'entity'      => $entity,
			'edit_form'   => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Creates a form to edit a Competizione entity.
	 *
	 * @param Competizione $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm( Competizione $entity ) {
		$form = $this->createForm( new CompetizioneType(), $entity, array(
			'action' => $this->generateUrl( 'competizione_update', array( 'id' => $entity->getId() ) ),
			'method' => 'PUT',
		) );

		$form->add( 'submit', 'submit', array( 'label' => 'Update' ) );

		return $form;
	}

	/**
	 * Edits an existing Competizione entity.
	 *
	 * @Route("/{id}", name="competizione_update")
	 * @Method("PUT")
	 * @Template("AcmeDemoBundle:Competizione:edit.html.twig")
	 */
	public function updateAction( Request $request, $id ) {
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository( 'AcmeDemoBundle:Competizione' )->find( $id );

		if ( ! $entity ) {
			throw $this->createNotFoundException( 'Unable to find Competizione entity.' );
		}

		$deleteForm = $this->createDeleteForm( $id );
		$editForm   = $this->createEditForm( $entity );
		$editForm->handleRequest( $request );

		if ( $editForm->isValid() ) {
			$em->flush();

			return $this->redirect( $this->generateUrl( 'competizione_edit', array( 'id' => $id ) ) );
		}

		return array(
			'entity'      => $entity,
			'edit_form'   => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	 * Deletes a Competizione entity.
	 *
	 * @Route("/{id}", name="competizione_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction( Request $request, $id ) {
		$form = $this->createDeleteForm( $id );
		$form->handleRequest( $request );

		if ( $form->isValid() ) {
			$em     = $this->getDoctrine()->getManager();
			$entity = $em->getRepository( 'AcmeDemoBundle:Competizione' )->find( $id );

			if ( ! $entity ) {
				throw $this->createNotFoundException( 'Unable to find Competizione entity.' );
			}

			$em->remove( $entity );
			$em->flush();
		}

		return $this->redirect( $this->generateUrl( 'competizione' ) );
	}

	/**
	 * Creates a form to delete a Competizione entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm( $id ) {
		return $this->createFormBuilder()
		            ->setAction( $this->generateUrl( 'competizione_delete', array( 'id' => $id ) ) )
		            ->setMethod( 'DELETE' )
		            ->add( 'submit', 'submit', array( 'label' => 'Delete' ) )
		            ->getForm();
	}


	/**
	 * @Route("/crea")
	 * @Method({"POST"})
	 */
	public function creaCompetizioneAction( Request $r ) {
		$user             = $this->get( 'security.token_storage' )->getToken()->getUser();
		$jsonCompetizione = array(
			"nome"            => "nuova competizione",
			"utente"          => array( "id" => $user->getId() ),
			"tipo"            => "TORNEO",
			"statoAttuale"    => "ATTESA",
			"maxPartecipanti" => 10,
			"descrizione"     => "bravo",
			"avatar"          => "path/della/foto"
		);

		$serializer   = SerializerBuilder::create()->build();
		$competizione = $serializer->deserialize( $jsonCompetizione, 'AcmeDemoBundle\Competizione', 'json' );

		$validator = $this->get( 'validator' );
		$errori    = $validator->validate( $competizione );

		if ( count( $errori ) > 0 ) {
			$errorsString = (string) $errori;

			return new Response( $errorsString );
		}

		$em = $this->getDoctrine()->getManager();
		$em->persist( $competizione );
		$em->flush();

		return new JsonResponse( array( "id" => $competizione->getId() ) );
	}


	/**
	 * @Route("/partecipa")
	 * @Method({"POST"})
	 */
	public function partecipaCompetizioneAction( Request $r ) {
		$jsonCompetizione = array(
			"squadra"      => array( "id" => 10 ),
			"competizione" => array( "id" => 2 )
		);

		$serializer   = SerializerBuilder::create()->build();
		$competizione = $serializer->deserialize( $jsonCompetizione, 'AcmeDemoBundle\CompetizioneHaSquadra', 'json' );

		$validator = $this->get( 'validator' );
		$errori    = $validator->validate( $competizione );

		if ( count( $errori ) > 0 ) {
			$errorsString = (string) $errori;

			return new Response( $errorsString );
		}

		$em = $this->getDoctrine()->getManager();
		$em->persist( $competizione );
		$em->flush();

		return new JsonResponse( array( "id" => $competizione->getId() ) );
	}
}
