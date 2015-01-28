<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SquadraVendeGiocatore
 *
 * @ORM\Table(name="Squadra_vende_Giocatore", indexes={@ORM\Index(name="fk_Squadra_has_Giocatore_Giocatore1_idx", columns={"id_giocatore"}), @ORM\Index(name="fk_Squadra_has_Giocatore_Squadra1_idx", columns={"id_squadra"})})
 * @ORM\Entity
 */
class SquadraVendeGiocatore
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prezzo", type="integer", nullable=true)
     */
    private $prezzo;

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
     * Set prezzo
     *
     * @param integer $prezzo
     * @return SquadraVendeGiocatore
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;

        return $this;
    }

    /**
     * Get prezzo
     *
     * @return integer 
     */
    public function getPrezzo()
    {
        return $this->prezzo;
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
     * @return SquadraVendeGiocatore
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
     * @return SquadraVendeGiocatore
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
