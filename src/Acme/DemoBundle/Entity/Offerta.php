<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offerta
 *
 * @ORM\Table(name="Offerta", indexes={@ORM\Index(name="fk_Competizione_has_Giocatore_Giocatore1_idx", columns={"id_giocatore"}), @ORM\Index(name="fk_Competizione_has_Giocatore_Competizione1_idx", columns={"id_competizione"}), @ORM\Index(name="fk_Offerta_Squadra1_idx", columns={"id_squadra"})})
 * @ORM\Entity
 */
class Offerta
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
     * @var \Acme\DemoBundle\Entity\Competizione
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Competizione")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_competizione", referencedColumnName="id")
     * })
     */
    private $idCompetizione;



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
     * @return Offerta
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
     * @return Offerta
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

    /**
     * Set idCompetizione
     *
     * @param \Acme\DemoBundle\Entity\Competizione $idCompetizione
     * @return Offerta
     */
    public function setIdCompetizione(\Acme\DemoBundle\Entity\Competizione $idCompetizione = null)
    {
        $this->idCompetizione = $idCompetizione;

        return $this;
    }

    /**
     * Get idCompetizione
     *
     * @return \Acme\DemoBundle\Entity\Competizione 
     */
    public function getIdCompetizione()
    {
        return $this->idCompetizione;
    }
}
