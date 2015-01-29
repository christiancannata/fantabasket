<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="partita_reale")
 */
class PartitaReale {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 *
	 * @ORM\Column(name="punti_squadra_casa", type="float", nullable=true)
	 */
	private $puntiSquadraCasa;


	/**
	 *
	 * @ORM\Column(name="punti_squadra_trasferta", type="float", nullable=true)
	 */
	private $puntiSquadraTrasferta;


	/**
	 *
	 * @ORM\Column(name="voti_aggiornati", type="integer", nullable=true)
	 */
	private $votiAggiornati = 0;


	/**
	 * @ORM\OneToOne(targetEntity="SquadraReale")
	 * @ORM\JoinColumn(name="id_squadra_casa", referencedColumnName="id")
	 **/
	private $squadraCasa;


	/**
	 * @ORM\OneToOne(targetEntity="SquadraReale")
	 * @ORM\JoinColumn(name="id_squadra_trasferta", referencedColumnName="id")
	 **/
	private $squadraTrasferta;


	/**
	 * @ORM\OneToOne(targetEntity="GiornataReale")
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
	 * @return string
	 */
	public function getDescrizione() {
		return $this->descrizione;
	}

	/**
	 * @param string $descrizione
	 */
	public function setDescrizione( $descrizione ) {
		$this->descrizione = $descrizione;
	}


	/**
	 * @return mixed
	 */
	public function getVotiAggiornati() {
		return $this->votiAggiornati;
	}

	/**
	 * @param mixed $votiAggiornati
	 */
	public function setVotiAggiornati( $votiAggiornati ) {
		$this->votiAggiornati = $votiAggiornati;
	}

	/**
	 * @return mixed
	 */
	public function getPuntiSquadraCasa() {
		return $this->puntiSquadraCasa;
	}

	/**
	 * @param mixed $puntiSquadraCasa
	 */
	public function setPuntiSquadraCasa( $puntiSquadraCasa ) {
		$this->puntiSquadraCasa = $puntiSquadraCasa;
	}

	/**
	 * @return mixed
	 */
	public function getPuntiSquadraTrasferta() {
		return $this->puntiSquadraTrasferta;
	}

	/**
	 * @param mixed $puntiSquadraTrasferta
	 */
	public function setPuntiSquadraTrasferta( $puntiSquadraTrasferta ) {
		$this->puntiSquadraTrasferta = $puntiSquadraTrasferta;
	}

	/**
	 * @return mixed
	 */
	public function getSquadraCasa() {
		return $this->squadraCasa;
	}

	/**
	 * @param mixed $squadraCasa
	 */
	public function setSquadraCasa( $squadraCasa ) {
		$this->squadraCasa = $squadraCasa;
	}

	/**
	 * @return mixed
	 */
	public function getSquadraTrasferta() {
		return $this->squadraTrasferta;
	}

	/**
	 * @param mixed $squadraTrasferta
	 */
	public function setSquadraTrasferta( $squadraTrasferta ) {
		$this->squadraTrasferta = $squadraTrasferta;
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

}
