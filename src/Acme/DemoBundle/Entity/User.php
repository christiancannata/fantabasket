<?php

namespace Acme\DemoBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="facebook_id", type="string", nullable=true)
	 */
	private $facebookID;


	/**
	 * @var string
	 *
	 * @ORM\Column(name="nome", type="string", nullable=true)
	 */
	private $nome;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cognome", type="string", nullable=true)
	 */
	private $cognome;


	/**
	 *  @ORM\OneToMany(targetEntity="Squadra", mappedBy="id_user")
	 **/
	private $squadre;

	public function __construct()
	{
		parent::__construct();
		$this->squadre = new ArrayCollection();
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
     * Set githubID
     *
     * @param string $githubID
     * @return User
     */
    public function setFacebookID($githubID)
    {
        $this->facebookID = $githubID;

        return $this;
    }

    /**
     * Get githubID
     *
     * @return string 
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

	/**
	 * @return string
	 */
	public function getCognome() {
		return $this->cognome;
	}

	/**
	 * @param string $cognome
	 */
	public function setCognome( $cognome ) {
		$this->cognome = $cognome;
	}

	/**
	 * @return string
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param string $nome
	 */
	public function setNome( $nome ) {
		$this->nome = $nome;
	}

}
