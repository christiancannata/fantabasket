<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="giornata")
 */
class Giornata {
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
	 * @var string
	 *
	 * @ORM\Column(name="profilo", type="string",  columnDefinition="ENUM('ANDATA','RITORNO') " ,nullable=false)
	 */
	private $tipo="ANDATA";


	/**
	 * @var string
	 *
	 * @ORM\Column(name="descrizione", type="text", nullable=true)
	 */
	private $descrizione;

	/**
	 * @ORM\ManyToOne(targetEntity="Competizione", inversedBy="giornate")
	 * @ORM\JoinColumn(name="id_competizione", referencedColumnName="id")
	 **/
	private $competizione;


	/**
	 *
	 * @ORM\Column(name="voti_aggiornati", type="integer", nullable=true)
	 */
	private $votiAggiornati;


	/**
	 * @ORM\OneToOne(targetEntity="Classifica", mappedBy="giornata")
	 **/
	private $classifica;

	/**
	 *  @ORM\OneToMany(targetEntity="Voto", mappedBy="id_giornata")
	 **/
	private $voti;


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
	public function getClassifica() {
		return $this->classifiche;
	}

	/**
	 * @return mixed
	 */
	public function getVoti() {
		return $this->voti;
	}

	/**
	 * @param mixed $voti
	 */
	public function setVoti( $voti ) {
		$this->voti = $voti;
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



}
