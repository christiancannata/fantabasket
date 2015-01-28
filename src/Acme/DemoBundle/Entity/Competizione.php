<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competizione
 *
 * @ORM\Table(name="Competizione", indexes={@ORM\Index(name="fk_Competizione_Utente1_idx", columns={"id_utente"})})
 * @ORM\Entity
 */
class Competizione
{
    /**
     * @var string
     *
     * @ORM\Column(name="stato_attuale", type="string", length=45, nullable=true)
     */
    private $statoAttuale;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Acme\DemoBundle\Entity\Utente
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\Utente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utente", referencedColumnName="id")
     * })
     */
    private $idUtente;



    /**
     * Set statoAttuale
     *
     * @param string $statoAttuale
     * @return Competizione
     */
    public function setStatoAttuale($statoAttuale)
    {
        $this->statoAttuale = $statoAttuale;

        return $this;
    }

    /**
     * Get statoAttuale
     *
     * @return string 
     */
    public function getStatoAttuale()
    {
        return $this->statoAttuale;
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
     * @return Competizione
     */
    public function setIdUtente(\Acme\DemoBundle\Entity\Utente $idUtente = null)
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
}
