<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Game
 *
 * @ORM\Table(name="game", indexes={@ORM\Index(name="id_equipe1match", columns={"id_equipe1"}), @ORM\Index(name="id_equipe2match", columns={"id_equipe2"})})
 * @ORM\Entity
 */
class Game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_match", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatch;

 /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;



    /**
     * @var int|null
     * @Assert\PositiveOrZero(message="entrez le score")
     * @ORM\Column(name="score", type="integer", nullable=true)
     * @Assert\NotBlank(message="veillez entrer le score")
     */
    private $score;

    /**
     * @var string|null
     * @Assert\NotBlank(message="veillez entrer le lien streaming")
     *
     * @ORM\Column(name="lien_streaming", type="string", length=255, nullable=true)
     */
    private $lienStreaming;

    /**
     * @var string|null
     *@Assert\NotBlank(message="veillez entrer le status")
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string|null
     * @Assert\NotBlank
     *
     * @ORM\Column(name="gold", type="string", length=255, nullable=true)
     */
    private $gold;

    /**
     * 
     * @var string|null
     * @Assert\NotBlank
     *
     * @ORM\Column(name="duree", type="string", length=255, nullable=true)
     */
    private $duree;

    /**
     
     *@Assert\NotBlank
     * @ORM\Column(name="date", type="string", length=255, nullable=true)
     * @Assert\Date
     * @Assert\GreaterThan("today")
     * @var null|string A "Y-m-d" formatted value
     */
    private $date;

    /**
     * @var \Equipe
     *@Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe1", referencedColumnName="id_equipe")
     * })
     */
    private $idEquipe1;

    /**
     * @var \Equipe
     *@Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe2", referencedColumnName="id_equipe")
     * })
     */
    private $idEquipe2;

    public function getIdMatch(): ?int
    {
        return $this->idMatch;
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



    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getLienStreaming(): ?string
    {
        return $this->lienStreaming;
    }

    public function setLienStreaming(?string $lienStreaming): self
    {
        $this->lienStreaming = $lienStreaming;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getGold(): ?string
    {
        return $this->gold;
    }

    public function setGold(?string $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdEquipe1(): ?Equipe
    {
        return $this->idEquipe1;
    }

    public function setIdEquipe1(?Equipe $idEquipe1): self
    {
        $this->idEquipe1 = $idEquipe1;

        return $this;
    }

    public function getIdEquipe2(): ?Equipe
    {
        return $this->idEquipe2;
    }

    public function setIdEquipe2(?Equipe $idEquipe2): self
    {
        $this->idEquipe2 = $idEquipe2;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->lienStreaming;

    }


}
