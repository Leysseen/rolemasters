<?php

namespace App\Entity;

use App\Repository\ScenarioRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioRepository::class)
 */
class Scenario
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pitch;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifiedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="scenarios")
     */
    private $auteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Scene", mappedBy="scenario")
     */
    private $scenes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jdr", inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jdr;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", mappedBy="scenario")
     */
    private $personnages;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Lieux", mappedBy="scenario")
     */
    private $lieux;

    public function __construct()
    {
        $this->published = true;
        $this->createdAt = new Datetime('now');
        $this->scenes = new ArrayCollection();
        $this->personnages = new ArrayCollection();
        $this->lieux = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPitch(): ?string
    {
        return $this->pitch;
    }

    public function setPitch(?string $pitch): self
    {
        $this->pitch = $pitch;

        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

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

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }

    public function setModifiedAt(?\DateTimeInterface $modifiedAt): self
    {
        $this->modifiedAt = $modifiedAt;

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

        return $this;
    }

    public function getScenes()
    {
        return $this->scenes;
    }

    public function setScene(Scene $scene): self
    {
        $this->scenes[] = $scene;
        $scene->setScenario($this);

        return $this;
    }

    public function removeScene(Scene $scene): self
    {
        $this->scenes->removeElement($scene);

        return $this;
    }

    public function getPersonnages()
    {
        return $this->personnages;
    }

    public function setPersonnages(Personnage $personnage): self
    {
        $this->personnages[] = $personnage;
        $personnage->setScenario($this);

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
        $lieux->setScenario($this);

        return $this;
    }

    public function removeLieux(Lieux $lieux): self
    {
        $this->lieux->removeElement($lieux);

        return $this;
    }
}
