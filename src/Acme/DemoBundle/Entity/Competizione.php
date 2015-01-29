<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity
 * @ORM\Table(name="competizione")
 */
class Competizione {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nome", type="string", nullable=true)
	 */
	private $nome;


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
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="competizioni")
	 * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
	 **/
	private $utente;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="tipo", type="string",  columnDefinition="ENUM('TORNEO','CAMPIONATO') " ,nullable=false)
	 */
	private $tipo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="stato_attuale", type="string" ,nullable=false)
	 */
	private $statoAttuale;


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
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param string $nome
	 */
	public function setNome( $nome ) {
		$this->nome = $nome;
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
	public function getUtente() {
		return $this->utente;
	}

	/**
	 * @param mixed $utente
	 */
	public function setUtente( $utente ) {
		$this->utente = $utente;
	}

	/**
	 * @return string
	 */
	public function getTipo() {
		return $this->tipo;
	}

	/**
	 * @param string $tipo
	 */
	public function setTipo( $tipo ) {
		$this->tipo = $tipo;
	}

	/**
	 * @return string
	 */
	public function getStatoAttuale() {
		return $this->statoAttuale;
	}

	/**
	 * @param string $statoAttuale
	 */
	public function setStatoAttuale( $statoAttuale ) {
		$this->statoAttuale = $statoAttuale;
	}


}
