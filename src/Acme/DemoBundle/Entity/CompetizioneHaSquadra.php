<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="competizione_ha_squadra")
 */
class CompetizioneHaSquadra
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Competizione")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_competizione", referencedColumnName="id")
	 * })
	 */
	protected $competizione;

	/**
	 * @ORM\ManyToOne(targetEntity="Squadra")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_squadra", referencedColumnName="id")
	 * })
	 */
	protected $squadra;


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



	public function __construct()
	{
		parent::__construct();
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




}
