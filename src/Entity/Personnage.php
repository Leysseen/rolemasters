<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
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
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $caracteristiques;

    /**
     * @ORM\Column(type="text")
     */
    private $competences;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $background;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="personnages")
     */
    private $auteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Scenario", inversedBy="personnages")
     */
    private $scenarios;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jdr", inversedBy="personnages")
     */
    private $jdr;

    public function __construct()
    {
        $this->scenarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCaracteristiques(): ?string
    {
        return $this->caracteristiques;
    }

    public function setCaracteristiques(string $caracteristiques): self
    {
        $this->caracteristiques = $caracteristiques;

        return $this;
    }

    public function getCompetences(): ?string
    {
        return $this->competences;
    }

    public function setCompetences(string $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function setAuteur(User $user): self
    {
        $this->auteur = $user;

        return $this;
    }

    public function getScenarios()
    {
        return $this->scenarios;
    }

    public function setScenario(Scenario $scenario)
    {
        $this->scenarios[] = $scenario;
        $scenario->setPersonnages($this);

        return $this;
    }

    public function getJdr()
    {
        return $this->jdr;
    }

    public function setJdr(Jdr $jdr)
    {
        $this->jdr = $jdr;
        $jdr->addPersonnage($this);

        return $this;
    }
}
