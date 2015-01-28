<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Torneo
 *
 * @ORM\Table(name="Torneo", indexes={@ORM\Index(name="fk_Torneo_Non1_idx", columns={"Non_id"})})
 * @ORM\Entity
 */
class Torneo
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
     * @var \Acme\DemoBundle\Entity\Competizione
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\DemoBundle\Entity\Competizione")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Non_id", referencedColumnName="id")
     * })
     */
    private $non;



    /**
     * Set id
     *
     * @param integer $id
     * @return Torneo
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
     * Set non
     *
     * @param \Acme\DemoBundle\Entity\Competizione $non
     * @return Torneo
     */
    public function setNon(\Acme\DemoBundle\Entity\Competizione $non)
    {
        $this->non = $non;

        return $this;
    }

    /**
     * Get non
     *
     * @return \Acme\DemoBundle\Entity\Competizione 
     */
    public function getNon()
    {
        return $this->non;
    }
}
