<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table(name="personne", indexes={@ORM\Index(name="personne_equipe", columns={"id_equipe"})})
 * @ORM\Entity
 */
class Personne
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_personne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPersonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_personne", type="string", length=20, nullable=true)
     */
    private $nomPersonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom_personne", type="string", length=30, nullable=true)
     */
    private $prenomPersonne;

    /**
     * @var int|null
     *
     * @ORM\Column(name="contact", type="integer", nullable=true)
     */
    private $contact;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var string|null
     *
     * @ORM\Column(name="role", type="string", length=30, nullable=true)
     */
    private $role;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=15, nullable=true)
     */
    private $motDePasse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="competence", type="string", length=250, nullable=true)
     */
    private $competence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="jeux", type="string", length=50, nullable=true)
     */
    private $jeux;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="heros", type="string", length=20, nullable=true)
     */
    private $heros;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ig_name", type="string", length=20, nullable=true)
     */
    private $igName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ig_role", type="string", length=10, nullable=true)
     */
    private $igRole;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ig_rank", type="integer", nullable=true)
     */
    private $igRank;

    /**
     * @var Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe", referencedColumnName="id_equipe")
     * })
     */
    private $idEquipe;

    /**
     * @return int
     */
    public function getIdPersonne(): int
    {
        return $this->idPersonne;
    }

    /**
     * @param int $idPersonne
     */
    public function setIdPersonne(int $idPersonne): void
    {
        $this->idPersonne = $idPersonne;
    }

    /**
     * @return string|null
     */
    public function getNomPersonne(): ?string
    {
        return $this->nomPersonne;
    }

    /**
     * @param string|null $nomPersonne
     */
    public function setNomPersonne(?string $nomPersonne): void
    {
        $this->nomPersonne = $nomPersonne;
    }

    /**
     * @return string|null
     */
    public function getPrenomPersonne(): ?string
    {
        return $this->prenomPersonne;
    }

    /**
     * @param string|null $prenomPersonne
     */
    public function setPrenomPersonne(?string $prenomPersonne): void
    {
        $this->prenomPersonne = $prenomPersonne;
    }

    /**
     * @return int|null
     */
    public function getContact(): ?int
    {
        return $this->contact;
    }

    /**
     * @param int|null $contact
     */
    public function setContact(?int $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return int|null
     */
    public function getRating(): ?int
    {
        return $this->rating;
    }

    /**
     * @param int|null $rating
     */
    public function setRating(?int $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     */
    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string|null
     */
    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    /**
     * @param string|null $motDePasse
     */
    public function setMotDePasse(?string $motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getCompetence(): ?string
    {
        return $this->competence;
    }

    /**
     * @param string|null $competence
     */
    public function setCompetence(?string $competence): void
    {
        $this->competence = $competence;
    }

    /**
     * @return string|null
     */
    public function getJeux(): ?string
    {
        return $this->jeux;
    }

    /**
     * @param string|null $jeux
     */
    public function setJeux(?string $jeux): void
    {
        $this->jeux = $jeux;
    }

    /**
     * @return float|null
     */
    public function getPrix(): ?float
    {
        return $this->prix;
    }

    /**
     * @param float|null $prix
     */
    public function setPrix(?float $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return string|null
     */
    public function getHeros(): ?string
    {
        return $this->heros;
    }

    /**
     * @param string|null $heros
     */
    public function setHeros(?string $heros): void
    {
        $this->heros = $heros;
    }

    /**
     * @return string|null
     */
    public function getIgName(): ?string
    {
        return $this->igName;
    }

    /**
     * @param string|null $igName
     */
    public function setIgName(?string $igName): void
    {
        $this->igName = $igName;
    }

    /**
     * @return string|null
     */
    public function getIgRole(): ?string
    {
        return $this->igRole;
    }

    /**
     * @param string|null $igRole
     */
    public function setIgRole(?string $igRole): void
    {
        $this->igRole = $igRole;
    }

    /**
     * @return int|null
     */
    public function getIgRank(): ?int
    {
        return $this->igRank;
    }

    /**
     * @param int|null $igRank
     */
    public function setIgRank(?int $igRank): void
    {
        $this->igRank = $igRank;
    }

    /**
     * @return Equipe
     */
    public function getIdEquipe(): Equipe
    {
        return $this->idEquipe;
    }

    /**
     * @param Equipe $idEquipe
     */
    public function setIdEquipe(Equipe $idEquipe): void
    {
        $this->idEquipe = $idEquipe;
    }

    public function __toString()
    {
        return $this->getNomPersonne();
    }


}
