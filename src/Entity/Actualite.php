<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Actualite
 *
 * @ORM\Table(name="actualite", indexes={@ORM\Index(name="id_actumatch", columns={"id_match"}), @ORM\Index(name="id_personneactu", columns={"id_personne"})})
 * @ORM\Entity
 */
class Actualite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_actualite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActualite;

    /**
     * @var string
     * 
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * 
     * @Groups({"actu"})
     */
    private $image;

    /**
     * @var string
     * 
     * @ORM\Column(name="video", type="string", length=255, nullable=false)
     * @Groups({"actu"})
     */
    private $video;

    /**
     * @var \Game
     *
     * @ORM\ManyToOne(targetEntity="Game")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_match", referencedColumnName="id_match")
     * })
     */
    private $idMatch;

    /**
     * @var \Personne
     * 
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personne", referencedColumnName="id_personne")
     * })
     */
    
    private $idPersonne;
 
 /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="jeu", type="string", length=255, nullable=false)
     * @Groups({"actu"})
     */
    private $jeu;


     /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     * @Groups({"actu"})
     */
    private $titre;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Groups({"actu"})
     */
    private $description;
   
    /**
     * @Assert\NotBlank(message="veillez spécifier une date")
     * @Assert\Date(message = "La date n'est pas valide.")
     * @Groups({"actu"})
     
     * @ORM\Column(type="date", nullable=false)
     */
    private $date;

    public function getIdActualite(): ?int
    {
        return $this->idActualite;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getIdMatch(): ?Game
    {
        return $this->idMatch;
    }

    public function setIdMatch(?Game $idMatch): self
    {
        $this->idMatch = $idMatch;

        return $this;
    }

    public function getIdPersonne(): ?Personne
    {
        return $this->idPersonne;
    }

    public function setIdPersonne(?Personne $idPersonne): self
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    public function getJeu(): ?string
    {
        return $this->jeu;
    }

    public function setJeu(string $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

}
