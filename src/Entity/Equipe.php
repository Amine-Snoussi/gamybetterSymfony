<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass=EquipeRepository::class)
 */
class Equipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idEquipe;


    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description_equipe", type="string", length=255, nullable=true)
     * @Assert\NotBlank
     */
    private $descriptionEquipe;



    public function __construct()
    {
    }

    public function getIdEquipe(): int
    {
        return $this->idEquipe;
    }





    public function getNom(): ?string
    {
        return $this->nom;
    }


    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }


    public function getDescriptionEquipe(): ?string
    {
        return $this->descriptionEquipe;
    }


    public function setDescriptionEquipe(string $descriptionEquipe): void
    {
        $this->descriptionEquipe = $descriptionEquipe;
    }


    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nom;
    }
    public function getEquipe(): ?Equipe
    {
        return $this->Equipe;
    }
    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }
}
