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
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=30, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=15, nullable=false)
     */
    private $motDePasse;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="competence", type="string", length=250, nullable=false)
     */
    private $competence;

    /**
     * @var string
     *
     * @ORM\Column(name="jeux", type="string", length=50, nullable=false)
     */
    private $jeux;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="heros", type="string", length=20, nullable=false)
     */
    private $heros;

    /**
     * @var string
     *
     * @ORM\Column(name="ig_name", type="string", length=20, nullable=false)
     */
    private $igName;

    /**
     * @var string
     *
     * @ORM\Column(name="ig_role", type="string", length=10, nullable=false)
     */
    private $igRole;

    /**
     * @var int
     *
     * @ORM\Column(name="ig_rank", type="integer", nullable=false)
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
