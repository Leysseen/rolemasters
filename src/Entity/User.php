<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\ManagerConfigurator;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ObjectManager;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passwd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Auth")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auth;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Scenario", mappedBy="auteur")
     */
    private $scenarios;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnage", mappedBy="auteur")
     */
    private $personnages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lieux", mappedBy="auteur")
     */
    private $lieux;

    public function __construct(ObjectManager $manager)
    {
        $this->createdAt = new Datetime('now');
        $auth = $manager->getRepository(Auth::class)
            ->findOneBy(array('level' => 'Inscrit'));

        $this->auth = $auth;
        $this->scenarios = new ArrayCollection();
        $this->personnages = new ArrayCollection();
        $this->lieux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    public function setPasswd(string $passwd): self
    {
        $this->passwd = $passwd;

        return $this;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function setAuth(Auth $auth): self
    {
        $this->auth = $auth;

        return $this;
    }

    public function getScenarios()
    {
        return $this->scenarios;
    }

    public function setScenario(Scenario $scenario): self
    {
        $this->scenarios[] = $scenario;
        $scenario->setAuteur($this);

        return $this;
    }

    public function removeScenario(Scenario $scenario): self
    {
        $this->scenarios->removeElement($scenario);

        return $this;
    }

    public function getPersonnages()
    {
        return $this->personnages;
    }

    public function setPersonnages(Personnage $personnage): self
    {
        $this->personnages[] = $personnage;
        $personnage->setAuteur($this);

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        $this->personnages->removeElement($personnage);

        return $this;
    }

    public function getLieux()
    {
        return $this->lieux;
    }

    public function setLieux(Lieux $lieux): self
    {
        $this->lieux[] = $lieux;
        $lieux->setAuteur($this);

        return $this;
    }

    public function removeLieux(Lieux $lieux): self
    {
        $this->lieux->removeElement($lieux);

        return $this;
    }
}
