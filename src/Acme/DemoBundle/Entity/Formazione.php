<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formazione
 *
 * @ORM\Table(name="Formazione", indexes={@ORM\Index(name="fk_Formazione_Giornata1_idx", columns={"id_giornata"}), @ORM\Index(name="fk_Formazione_Squadra1_idx", columns={"id_squadra"})})
 * @ORM\Entity
 */
class Formazione
{
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
     * @var \Acme\DemoBundle\Entity\Giornata
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Giornata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_giornata", referencedColumnName="id")
     * })
     */
    private $idGiornata;



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
     * @return Formazione
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

    /**
     * Set idGiornata
     *
     * @param \Acme\DemoBundle\Entity\Giornata $idGiornata
     * @return Formazione
     */
    public function setIdGiornata(\Acme\DemoBundle\Entity\Giornata $idGiornata = null)
    {
        $this->idGiornata = $idGiornata;

        return $this;
    }

    /**
     * Get idGiornata
     *
     * @return \Acme\DemoBundle\Entity\Giornata 
     */
    public function getIdGiornata()
    {
        return $this->idGiornata;
    }
}
