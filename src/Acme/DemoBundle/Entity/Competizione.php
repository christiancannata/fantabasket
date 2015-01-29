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

	/**
	 * @var string
	 *
	 * @ORM\Column(name="descrizione", type="text" ,nullable=true)
	 */
	private $descrizione;

	/**
	 *  @ORM\OneToMany(targetEntity="Giornata", mappedBy="id_competizione")
	 **/
	private $giornate;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="max_partecipanti", type="integer", nullable=true)
	 */
	private $maxPartecipanti;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="avatar", type="string" ,nullable=true)
	 */
	private $avatar;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="modalita_mercato", type="string",  columnDefinition="ENUM('OFFLINE','ASTA_BUSTA_CHIUSA','DEFAULT') " ,nullable=false)
	 */
	private $modalitaMercato="DEFAULT";


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
	public function getGiornate() {
		return $this->giornate;
	}

	/**
	 * @return string
	 */
	public function getMaxPartecipanti() {
		return $this->maxPartecipanti;
	}

	/**
	 * @param string $maxPartecipanti
	 */
	public function setMaxPartecipanti( $maxPartecipanti ) {
		$this->maxPartecipanti = $maxPartecipanti;
	}

	/**
	 * @return string
	 */
	public function getAvatar() {
		return $this->avatar;
	}

	/**
	 * @param string $avatar
	 */
	public function setAvatar( $avatar ) {
		$this->avatar = $avatar;
	}

	/**
	 * @return string
	 */
	public function getModalitaMercato() {
		return $this->modalitaMercato;
	}

	/**
	 * @param string $modalitaMercato
	 */
	public function setModalitaMercato( $modalitaMercato ) {
		$this->modalitaMercato = $modalitaMercato;
	}



}
