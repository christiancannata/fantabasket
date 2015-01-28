<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Girone
 *
 * @ORM\Table(name="Girone", indexes={@ORM\Index(name="fk_Girone_Torneo1_idx", columns={"id_torneo"}), @ORM\Index(name="fk_Girone_Competizione1_idx", columns={"id_competizione"})})
 * @ORM\Entity
 */
class Girone
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
     * @var \Acme\DemoBundle\Entity\Torneo
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Torneo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_torneo", referencedColumnName="id")
     * })
     */
    private $idTorneo;

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
     * Set idTorneo
     *
     * @param \Acme\DemoBundle\Entity\Torneo $idTorneo
     * @return Girone
     */
    public function setIdTorneo(\Acme\DemoBundle\Entity\Torneo $idTorneo = null)
    {
        $this->idTorneo = $idTorneo;

        return $this;
    }

    /**
     * Get idTorneo
     *
     * @return \Acme\DemoBundle\Entity\Torneo 
     */
    public function getIdTorneo()
    {
        return $this->idTorneo;
    }

    /**
     * Set idCompetizione
     *
     * @param \Acme\DemoBundle\Entity\Competizione $idCompetizione
     * @return Girone
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
