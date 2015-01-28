<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SquadraHasGiocatore
 *
 * @ORM\Table(name="Squadra_has_giocatore", indexes={@ORM\Index(name="fk_Giocatore_has_Squadra_Squadra1_idx", columns={"id_squadra"}), @ORM\Index(name="fk_Giocatore_has_Squadra_Giocatore1_idx", columns={"id_giocatore"})})
 * @ORM\Entity
 */
class SquadraHasGiocatore
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
     * @var \Acme\DemoBundle\Entity\Giocatore
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Giocatore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_giocatore", referencedColumnName="id")
     * })
     */
    private $idGiocatore;



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
     * @return SquadraHasGiocatore
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
     * Set idGiocatore
     *
     * @param \Acme\DemoBundle\Entity\Giocatore $idGiocatore
     * @return SquadraHasGiocatore
     */
    public function setIdGiocatore(\Acme\DemoBundle\Entity\Giocatore $idGiocatore = null)
    {
        $this->idGiocatore = $idGiocatore;

        return $this;
    }

    /**
     * Get idGiocatore
     *
     * @return \Acme\DemoBundle\Entity\Giocatore 
     */
    public function getIdGiocatore()
    {
        return $this->idGiocatore;
    }
}
