<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="giocatore")
 */
class Giocatore
{
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
	 * @ORM\Column(name="cognome", type="string", nullable=true)
	 */
	private $cognome;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="prezzo", type="integer", nullable=true)
	 */
	private $prezzo;

	/**
	 *  @ORM\ManyToOne(targetEntity="SquadraReale", inversedBy="giocatori")
	 *  @ORM\JoinColumn(name="id_squadra_reale", referencedColumnName="id")
	 **/
	private $squadraReale;


	/**
	 *  @ORM\OneToMany(targetEntity="Voto", mappedBy="id_giocatore")
	 **/
	private $voti;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="ruolo", type="string",  columnDefinition="ENUM('PLAYMAKER','GUARDIA_ALA_PICCOLA','ALA_FORTE','PIVOT','ALLENATORE')" ,nullable=false)
	 */
	private $ruolo;


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
	public function getCognome() {
		return $this->cognome;
	}

	/**
	 * @param string $cognome
	 */
	public function setCognome( $cognome ) {
		$this->cognome = $cognome;
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
	public function getPrezzo() {
		return $this->prezzo;
	}

	/**
	 * @param string $prezzo
	 */
	public function setPrezzo( $prezzo ) {
		$this->prezzo = $prezzo;
	}

	/**
	 * @return mixed
	 */
	public function getSquadraReale() {
		return $this->squadraReale;
	}

	/**
	 * @param mixed $squadraReale
	 */
	public function setSquadraReale( $squadraReale ) {
		$this->squadraReale = $squadraReale;
	}

	/**
	 * @return string
	 */
	public function getRuolo() {
		return $this->ruolo;
	}

	/**
	 * @param string $ruolo
	 */
	public function setRuolo( $ruolo ) {
		$this->ruolo = $ruolo;
	}

	/**
	 * @return mixed
	 */
	public function getVoti() {
		return $this->voti;
	}


}
