<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity
 * @ORM\Table(name="classifica")
 */
class Classifica {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;


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


	/**
	 * @ORM\ManyToOne(targetEntity="Giornata", inversedBy="classifiche")
	 * @ORM\JoinColumn(name="id_giornata", referencedColumnName="id")
	 **/
	private $giornata;


	/**
	 * @ORM\OneToMany(targetEntity="ClassificaHaSquadra", mappedBy="classifica")
	 **/
	private $squadre;


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

	/**
	 * @return mixed
	 */
	public function getSquadre() {
		return $this->squadre;
	}


}
