<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormazioneHasGiocatore
 *
 * @ORM\Table(name="Formazione_has_Giocatore", indexes={@ORM\Index(name="fk_Formazione_has_Giocatore_Giocatore1_idx", columns={"id_giocatore"}), @ORM\Index(name="fk_Formazione_has_Giocatore_Formazione1_idx", columns={"id_formazione"})})
 * @ORM\Entity
 */
class FormazioneHasGiocatore
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
     * @var \Acme\DemoBundle\Entity\Giocatore
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Giocatore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_giocatore", referencedColumnName="id")
     * })
     */
    private $idGiocatore;

    /**
     * @var \Acme\DemoBundle\Entity\Formazione
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Formazione")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_formazione", referencedColumnName="id")
     * })
     */
    private $idFormazione;



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
     * @return FormazioneHasGiocatore
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
     * Set idFormazione
     *
     * @param \Acme\DemoBundle\Entity\Formazione $idFormazione
     * @return FormazioneHasGiocatore
     */
    public function setIdFormazione(\Acme\DemoBundle\Entity\Formazione $idFormazione = null)
    {
        $this->idFormazione = $idFormazione;

        return $this;
    }

    /**
     * Get idFormazione
     *
     * @return \Acme\DemoBundle\Entity\Formazione 
     */
    public function getIdFormazione()
    {
        return $this->idFormazione;
    }
}
