<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="formazione_ha_giocatore")
 */
class FormazioneHaGiocatore
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Giocatore")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_giocatore", referencedColumnName="id")
	 * })
	 */
	protected $giocatore;

	/**
	 * @ORM\ManyToOne(targetEntity="Formazione")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_formazione", referencedColumnName="id")
	 * })
	 */
	protected $formazione;


	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="timestamp", type="datetime", nullable=false)
	 */
	private $timestamp;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="last_update_timestamp", type="datetime", nullable=false)
	 */
	private $lastUpdateTimestamp;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="prezzo", type="integer", nullable=false)
	 */
	protected $prezzo = '0';

	public function __construct()
	{
		parent::__construct();
		// your own logic
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


	public function setGiocatore(Giocatore $giocatore) {
		$this->giocatore = $giocatore;

		return $this;
	}


	public function getGiocatore() {
		return $this->giocatore;
	}


	public function setSquadra(Squadra $squadra) {
		$this->squadra = $squadra;

		return $this;
	}


	public function getSquadra() {
		return $this->squadra;
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
	 * @return int
	 */
	public function getPrezzo() {
		return $this->prezzo;
	}

	/**
	 * @param int $prezzo
	 */
	public function setPrezzo( $prezzo ) {
		$this->prezzo = $prezzo;
	}


}
