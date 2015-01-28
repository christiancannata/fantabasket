<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Giornata
 *
 * @ORM\Table(name="Giornata", indexes={@ORM\Index(name="fk_Giornata_Girone1_idx", columns={"id_girone"})})
 * @ORM\Entity
 */
class Giornata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \Acme\DemoBundle\Entity\Girone
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\DemoBundle\Entity\Girone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_girone", referencedColumnName="id")
     * })
     */
    private $idGirone;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\DemoBundle\Entity\Squadra", inversedBy="giornata")
     * @ORM\JoinTable(name="giornata_has_squadra",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Giornata_id", referencedColumnName="id"),
     *     @ORM\JoinColumn(name="Giornata_Girone_id", referencedColumnName="id_girone")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Squadra_id", referencedColumnName="id"),
     *     @ORM\JoinColumn(name="Squadra_Utente_id", referencedColumnName="id_utente")
     *   }
     * )
     */
    private $squadra;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->squadra = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set numero
     *
     * @param integer $numero
     * @return Giornata
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Giornata
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
     * Set idGirone
     *
     * @param \Acme\DemoBundle\Entity\Girone $idGirone
     * @return Giornata
     */
    public function setIdGirone(\Acme\DemoBundle\Entity\Girone $idGirone)
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

    /**
     * Add squadra
     *
     * @param \Acme\DemoBundle\Entity\Squadra $squadra
     * @return Giornata
     */
    public function addSquadra(\Acme\DemoBundle\Entity\Squadra $squadra)
    {
        $this->squadra[] = $squadra;

        return $this;
    }

    /**
     * Remove squadra
     *
     * @param \Acme\DemoBundle\Entity\Squadra $squadra
     */
    public function removeSquadra(\Acme\DemoBundle\Entity\Squadra $squadra)
    {
        $this->squadra->removeElement($squadra);
    }

    /**
     * Get squadra
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSquadra()
    {
        return $this->squadra;
    }
}
