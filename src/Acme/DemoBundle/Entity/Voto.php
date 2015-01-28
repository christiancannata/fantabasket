<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voto
 *
 * @ORM\Table(name="Voto", indexes={@ORM\Index(name="fk_Voto_Giocatore1_idx", columns={"id_giocatore"})})
 * @ORM\Entity
 */
class Voto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \Acme\DemoBundle\Entity\Giocatore
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\DemoBundle\Entity\Giocatore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_giocatore", referencedColumnName="id")
     * })
     */
    private $idGiocatore;



    /**
     * Set id
     *
     * @param integer $id
     * @return Voto
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set idGiocatore
     *
     * @param \Acme\DemoBundle\Entity\Giocatore $idGiocatore
     * @return Voto
     */
    public function setIdGiocatore(\Acme\DemoBundle\Entity\Giocatore $idGiocatore)
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
