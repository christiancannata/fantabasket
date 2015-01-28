<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Giocatore
 *
 * @ORM\Table(name="Giocatore", indexes={@ORM\Index(name="fk_Giocatore_Squadra_reale1_idx", columns={"id_squadra_reale"})})
 * @ORM\Entity
 */
class Giocatore
{
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=225, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cognome", type="string", length=225, nullable=true)
     */
    private $cognome;

    /**
     * @var integer
     *
     * @ORM\Column(name="crediti", type="integer", nullable=true)
     */
    private $crediti;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Acme\DemoBundle\Entity\SquadraReale
     *
     * @ORM\ManyToOne(targetEntity="Acme\DemoBundle\Entity\SquadraReale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_squadra_reale", referencedColumnName="id")
     * })
     */
    private $idSquadraReale;



    /**
     * Set nome
     *
     * @param string $nome
     * @return Giocatore
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cognome
     *
     * @param string $cognome
     * @return Giocatore
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;

        return $this;
    }

    /**
     * Get cognome
     *
     * @return string 
     */
    public function getCognome()
    {
        return $this->cognome;
    }

    /**
     * Set crediti
     *
     * @param integer $crediti
     * @return Giocatore
     */
    public function setCrediti($crediti)
    {
        $this->crediti = $crediti;

        return $this;
    }

    /**
     * Get crediti
     *
     * @return integer 
     */
    public function getCrediti()
    {
        return $this->crediti;
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
     * Set idSquadraReale
     *
     * @param \Acme\DemoBundle\Entity\SquadraReale $idSquadraReale
     * @return Giocatore
     */
    public function setIdSquadraReale(\Acme\DemoBundle\Entity\SquadraReale $idSquadraReale = null)
    {
        $this->idSquadraReale = $idSquadraReale;

        return $this;
    }

    /**
     * Get idSquadraReale
     *
     * @return \Acme\DemoBundle\Entity\SquadraReale 
     */
    public function getIdSquadraReale()
    {
        return $this->idSquadraReale;
    }
}
