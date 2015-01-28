<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Squadra
 *
 * @ORM\Table(name="Squadra", indexes={@ORM\Index(name="fk_Squadra_Utente1_idx", columns={"id_utente"})})
 * @ORM\Entity
 */
class Squadra
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
     * @var \Acme\DemoBundle\Entity\Utente
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\DemoBundle\Entity\Utente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utente", referencedColumnName="id")
     * })
     */
    private $idUtente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\DemoBundle\Entity\Giornata", mappedBy="squadra")
     */
    private $giornata;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->giornata = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set id
     *
     * @param integer $id
     * @return Squadra
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
     * Set idUtente
     *
     * @param \Acme\DemoBundle\Entity\Utente $idUtente
     * @return Squadra
     */
    public function setIdUtente(\Acme\DemoBundle\Entity\Utente $idUtente)
    {
        $this->idUtente = $idUtente;

        return $this;
    }

    /**
     * Get idUtente
     *
     * @return \Acme\DemoBundle\Entity\Utente 
     */
    public function getIdUtente()
    {
        return $this->idUtente;
    }

    /**
     * Add giornata
     *
     * @param \Acme\DemoBundle\Entity\Giornata $giornata
     * @return Squadra
     */
    public function addGiornatum(\Acme\DemoBundle\Entity\Giornata $giornata)
    {
        $this->giornata[] = $giornata;

        return $this;
    }

    /**
     * Remove giornata
     *
     * @param \Acme\DemoBundle\Entity\Giornata $giornata
     */
    public function removeGiornatum(\Acme\DemoBundle\Entity\Giornata $giornata)
    {
        $this->giornata->removeElement($giornata);
    }

    /**
     * Get giornata
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGiornata()
    {
        return $this->giornata;
    }
}
