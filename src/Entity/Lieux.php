<?php

namespace App\Entity;

use App\Repository\LieuxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LieuxRepository::class)
 */
class Lieux
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
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $contexte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="lieux")
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jdr", inversedBy="lieux")
     */
    private $jdr;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Scenario", inversedBy="lieux")
     */
    private $scenarios;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContexte(): ?string
    {
        return $this->contexte;
    }

    public function setContexte(string $contexte): self
    {
        $this->contexte = $contexte;

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

    public function getJdr()
    {
        return $this->jdr;
    }

    public function setJdr(Jdr $jdr): self
    {
        $this->jdr = $jdr;
        $jdr->addLieux($this);

        return $this;
    }

    public function getScenarios()
    {
        return $this->scenarios;
    }

    public function setScenario(Scenario $scenario)
    {
        $this->scenarios[] = $scenario;
        $scenario->setLieux($this);

        return $this;
    }
}
