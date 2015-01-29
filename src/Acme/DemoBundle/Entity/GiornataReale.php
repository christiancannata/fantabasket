<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="giornata_reale")
 */
class GiornataReale {
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
	 *
	 * @ORM\Column(name="voti_aggiornati", type="integer", nullable=true)
	 */
	private $votiAggiornati = 0;


	/**
	 * @ORM\OneToMany(targetEntity="PartitaReale", mappedBy="id_partita_reale")
	 **/
	private $partite;


	/**
	 * @ORM\OneToMany(targetEntity="Voto", mappedBy="id_giornata_reale")
	 **/
	private $voti;


	public function __construct() {
		parent::__construct();
		// your own logic
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
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
	 * @return mixed
	 */
	public function getPartite() {
		return $this->partite;
	}

	/**
	 * @param mixed $partite
	 */
	public function setPartite( $partite ) {
		$this->partite = $partite;
	}


}
