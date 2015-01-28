<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompetizioneHasSquadra
 *
 * @ORM\Table(name="Competizione_has_Squadra", indexes={@ORM\Index(name="fk_Competizione_has_Squadra_Squadra1_idx", columns={"id_squadra"}), @ORM\Index(name="fk_Competizione_has_Squadra_Competizione1_idx", columns={"id_competizione"})})
 * @ORM\Entity
 */
class CompetizioneHasSquadra
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
     * @return CompetizioneHasSquadra
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
     * Set idCompetizione
     *
     * @param \Acme\DemoBundle\Entity\Competizione $idCompetizione
     * @return CompetizioneHasSquadra
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
