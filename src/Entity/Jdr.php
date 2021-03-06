<?php

namespace App\Entity;

use App\Repository\JdrRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JdrRepository::class)
 */
class Jdr
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
     * @ORM\OneToMany(targetEntity="App\Entity\Scenario", mappedBy="jdr")
     */
    private $scenarios;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnage", mappedBy="jdr")
     */
    private $personnages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lieux", mappedBy="jdr")
     */
    private $lieux;

    public function __construct()
    {
        $this->scenarios = new ArrayCollection();
        $this->personnages = new ArrayCollection();
        $this->lieux = new ArrayCollection();
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

    public function getScenarios()
    {
        return $this->scenarios;
    }

    public function addScenario(Scenario $scenario)
    {
        $this->scenarios[] = $scenario;
        // on affecte à l'inverse
        $scenario->setJdr($this);

        return $this;
    }

    public function removeScenario(Scenario $scenario)
    {
        $this->scenarios->removeElement($scenario);
    }

    public function getPersonnages()
    {
        return $this->personnages;
    }

    public function addPersonnage(Personnage $personnage)
    {
        $this->personnages[] = $personnage;
        // on affecte à l'inverse
        $personnage->setJdr($this);

        return $this;
    }

    public function removePersonnage(Personnage $personnage)
    {
        $this->personnages->removeElement($personnage);
    }

    public function getLieux()
    {
        return $this->lieux;
    }

    public function addLieux(Lieux $lieux)
    {
        $this->lieux[] = $lieux;
        $lieux->setJdr($this);

        return $this;
    }

    public function removeLieux(Lieux $lieux)
    {
        $this->lieux->removeElement($lieux);
    }
}
