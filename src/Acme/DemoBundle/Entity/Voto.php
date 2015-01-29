<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="voto")
 */
class Voto {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="voto", type="float", nullable=false)
	 */
	private $voto;

	/**
	 * @ORM\ManyToOne(targetEntity="Giocatore", inversedBy="voti")
	 * @ORM\JoinColumn(name="id_giocatore", referencedColumnName="id")
	 **/
	private $giocatore;


	/**
	 * @ORM\ManyToOne(targetEntity="GiornataReale", inversedBy="voti")
	 * @ORM\JoinColumn(name="id_giornata_reale", referencedColumnName="id")
	 **/
	private $giornata;


	/**
	 * @var \DateTime
	 * @Gedmo\Timestampable(on="create")
	 * @Serializer\Type("DateTime")
	 * @ORM\Column(name="timestamp", type="datetime", nullable=false)
	 */
	private $timestamp;

	/**
	 * @var \DateTime
	 * @Gedmo\Timestampable(on="update")
	 * @Serializer\Type("DateTime")
	 * @ORM\Column(name="last_update_timestamp", type="datetime", nullable=false)
	 */
	private $lastUpdateTimestamp;


	public function __construct() {
		parent::__construct();
		// your own logic
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getVoto() {
		return $this->voto;
	}

	/**
	 * @param string $voto
	 */
	public function setVoto( $voto ) {
		$this->voto = $voto;
	}

	/**
	 * @return mixed
	 */
	public function getGiocatore() {
		return $this->giocatore;
	}

	/**
	 * @param mixed $giocatore
	 */
	public function setGiocatore( $giocatore ) {
		$this->giocatore = $giocatore;
	}

	/**
	 * @return \DateTime
	 */
	public function getLastUpdateTimestamp() {
		return $this->lastUpdateTimestamp;
	}

	/**
	 * @param \DateTime $lastUpdateTimestamp
	 */
	public function setLastUpdateTimestamp( $lastUpdateTimestamp ) {
		$this->lastUpdateTimestamp = $lastUpdateTimestamp;
	}

	/**
	 * @return \DateTime
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * @param \DateTime $timestamp
	 */
	public function setTimestamp( $timestamp ) {
		$this->timestamp = $timestamp;
	}

	/**
	 * @return mixed
	 */
	public function getGiornata() {
		return $this->giornata;
	}

	/**
	 * @param mixed $giornata
	 */
	public function setGiornata( $giornata ) {
		$this->giornata = $giornata;
	}


}
