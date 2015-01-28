<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GironeHasSquadra
 *
 * @ORM\Table(name="Girone_has_Squadra", indexes={@ORM\Index(name="fk_Girone_has_Squadra_Squadra1_idx", columns={"id_squadra"}), @ORM\Index(name="fk_Girone_has_Squadra_Girone1_idx", columns={"id_girone"})})
 * @ORM\Entity
 */
class GironeHasSquadra
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
     * @var \Acme\DemoBundle\Entity\Girone
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Girone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_girone", referencedColumnName="id")
     * })
     */
    private $idGirone;



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
     * @return GironeHasSquadra
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
     * Set idGirone
     *
     * @param \Acme\DemoBundle\Entity\Girone $idGirone
     * @return GironeHasSquadra
     */
    public function setIdGirone(\Acme\DemoBundle\Entity\Girone $idGirone = null)
    {
        $this->idGirone = $idGirone;

        return $this;
    }

    /**
     * Get idGirone
     *
     * @return \Acme\DemoBundle\Entity\Girone 
     */
    public function getIdGirone()
    {
        return $this->idGirone;
    }
}
