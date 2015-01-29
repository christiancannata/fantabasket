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
	 * @ORM\Column(name="voto_squadra_casa", type="float", nullable=true)
	 */
	private $votoSquadraCasa;


	/**
	 *
	 * @ORM\Column(name="voto_squadra_trasferta", type="float", nullable=true)
	 */
	private $votoSquadraTrasferta;


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
	 * @param string $descrizione
	 */
	public function setDescrizione( $descrizione ) {
		$this->descrizione = $descrizione;
	}

	/**
	 * @return mixed
	 */
	public function getCompetizione() {
		return $this->competizione;
	}

	/**
	 * @param mixed $competizione
	 */
	public function setCompetizione( $competizione ) {
		$this->competizione = $competizione;
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
	public function getVotoSquadraCasa() {
		return $this->votoSquadraCasa;
	}

	/**
	 * @param mixed $votoSquadraCasa
	 */
	public function setVotoSquadraCasa( $votoSquadraCasa ) {
		$this->votoSquadraCasa = $votoSquadraCasa;
	}

	/**
	 * @return mixed
	 */
	public function getVotoSquadraTrasferta() {
		return $this->votoSquadraTrasferta;
	}

	/**
	 * @param mixed $votoSquadraTrasferta
	 */
	public function setVotoSquadraTrasferta( $votoSquadraTrasferta ) {
		$this->votoSquadraTrasferta = $votoSquadraTrasferta;
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
