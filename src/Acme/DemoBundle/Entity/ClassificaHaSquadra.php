<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="classifica_ha_squadra")
 */
class ClassificaHaSquadra
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Classifica")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_classifica", referencedColumnName="id")
	 * })
	 */
	protected $classifica;

	/**
	 * @ORM\ManyToOne(targetEntity="Squadra")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_squadra", referencedColumnName="id")
	 * })
	 */
	protected $squadra;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="posizione", type="integer", nullable=true)
	 */
	private $posizione;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="punteggio", type="float", nullable=true)
	 */
	private $punteggio;



	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}





	public function setSquadra(Squadra $squadra) {
		$this->squadra = $squadra;

		return $this;
	}


	public function getSquadra() {
		return $this->squadra;
	}

	/**
	 * @return mixed
	 */
	public function getClassifica() {
		return $this->classifica;
	}

	/**
	 * @param mixed $classifica
	 */
	public function setClassifica( $classifica ) {
		$this->classifica = $classifica;
	}

	/**
	 * @return string
	 */
	public function getPosizione() {
		return $this->posizione;
	}

	/**
	 * @param string $posizione
	 */
	public function setPosizione( $posizione ) {
		$this->posizione = $posizione;
	}

	/**
	 * @return string
	 */
	public function getPunteggio() {
		return $this->punteggio;
	}

	/**
	 * @param string $punteggio
	 */
	public function setPunteggio( $punteggio ) {
		$this->punteggio = $punteggio;
	}



}
