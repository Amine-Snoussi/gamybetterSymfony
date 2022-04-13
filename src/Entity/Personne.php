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
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_equipe", referencedColumnName="id_equipe")
     * })
     */
    private $idEquipe;


}
