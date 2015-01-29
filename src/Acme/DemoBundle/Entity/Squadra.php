<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity
 * @ORM\Table(name="squadra")
 */
class Squadra
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
	 *  @ORM\ManyToOne(targetEntity="User", inversedBy="squadre")
	 *  @ORM\JoinColumn(name="id_user", referencedColumnName="id")
	 **/
	private $utente;


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


}
