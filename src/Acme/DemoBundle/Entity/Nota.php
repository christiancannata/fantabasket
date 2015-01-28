<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table(name="Nota", indexes={@ORM\Index(name="fk_Nota_Squadra1_idx", columns={"id_squadra"})})
 * @ORM\Entity
 */
class Nota
{
    /**
     * @var string
     *
     * @ORM\Column(name="testo", type="text", length=65535, nullable=true)
     */
    private $testo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Acme\DemoBundle\Entity\Squadra
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Squadra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_squadra", referencedColumnName="id")
     * })
     */
    private $idSquadra;



    /**
     * Set testo
     *
     * @param string $testo
     * @return Nota
     */
    public function setTesto($testo)
    {
        $this->testo = $testo;

        return $this;
    }

    /**
     * Get testo
     *
     * @return string 
     */
    public function getTesto()
    {
        return $this->testo;
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
     * Set idSquadra
     *
     * @param \Acme\DemoBundle\Entity\Squadra $idSquadra
     * @return Nota
     */
    public function setIdSquadra(\Acme\DemoBundle\Entity\Squadra $idSquadra = null)
    {
        $this->idSquadra = $idSquadra;

        return $this;
    }

    /**
     * Get idSquadra
     *
     * @return \Acme\DemoBundle\Entity\Squadra 
     */
    public function getIdSquadra()
    {
        return $this->idSquadra;
    }
}
