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
     * @Assert\NotBlank
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @GROUPS({"actu"})
     */
    private $image;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="video", type="string", length=255, nullable=false)
     * * @GROUPS({"actu"})
     */
    private $video;

    /**
     * @var \Game
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="Game")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_match", referencedColumnName="id_match")
     * })
     */
    private $idMatch;

    /**
     * @var \Personne
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_personne", referencedColumnName="id_personne")
     * })
     */
    private $idPersonne;

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


}
