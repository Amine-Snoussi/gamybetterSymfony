<?php

namespace App\Entity;
use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
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
     * @ORM\Column(name="nom_eq", type="string", length=255, nullable=true)
     */
    private $nomEq;

    /**
     * @var string
     *
     * @ORM\Column(name="description_equipe", type="string", length=255, nullable=true)
     */
    private $descriptionEquipe;



    public function __construct()
    {

    }

    public function getIdEquipe(): int
    {
        return $this->idEquipe;
    }


    public function setIdEquipe(int $idEquipe): void
    {
        $this->idEquipe = $idEquipe;
    }


    public function getNomEq(): ?string
    {
        return $this->nomEq;
    }


    public function setNomEq(string $nomEq): void
    {
        $this->nomEq = $nomEq;
    }


    public function getDescriptionEquipe(): ?string
    {
        return $this->descriptionEquipe;
    }


    public function setDescriptionEquipe(string $descriptionEquipe): void
    {
        $this->descriptionEquipe = $descriptionEquipe;
    }




}
