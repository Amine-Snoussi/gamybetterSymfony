<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="evenement_personne", columns={"id_proprietaire"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_eq", type="integer", nullable=false)
     */
    private $nbEq;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_event", type="string", length=255, nullable=false)
     */
    private $nomEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="description_event", type="string", length=255, nullable=false)
     */
    private $descriptionEvent;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut_event", type="date", nullable=true)
     */
    private $dateDebutEvent;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin_event", type="date", nullable=true)
     */
    private $dateFinEvent;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="liste_equipe", type="string", length=200, nullable=false)
     */
    private $listeEquipe;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proprietaire", referencedColumnName="id_personne")
     * })
     */
    private $idProprietaire;


}
