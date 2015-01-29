<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="partita")
 */
class Partita {
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
	private $votiAggiornati;


	/**
	 * @ORM\OneToOne(targetEntity="Formazione")
	 * @ORM\JoinColumn(name="id_formazione_casa", referencedColumnName="id")
	 **/
	private $formazioneCasa;


	/**
	 * @ORM\OneToOne(targetEntity="Formazione")
	 * @ORM\JoinColumn(name="id_formazione_trasferta", referencedColumnName="id")
	 **/
	private $formazioneTrasferta;



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
	public function getFormazioneCasa() {
		return $this->formazioneCasa;
	}

	/**
	 * @param mixed $formazioneCasa
	 */
	public function setFormazioneCasa( $formazioneCasa ) {
		$this->formazioneCasa = $formazioneCasa;
	}

	/**
	 * @return mixed
	 */
	public function getFormazioneTrasferta() {
		return $this->formazioneTrasferta;
	}

	/**
	 * @param mixed $formazioneTrasferta
	 */
	public function setFormazioneTrasferta( $formazioneTrasferta ) {
		$this->formazioneTrasferta = $formazioneTrasferta;
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


}
