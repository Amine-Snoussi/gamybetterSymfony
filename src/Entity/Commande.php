<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="commande_personne", columns={"IDpersonne"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateCommande = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_personne", type="string", length=20, nullable=true)
     */
    private $nomPersonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom_personne", type="string", length=20, nullable=true)
     */
    private $prenomPersonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_personne", type="string", length=30, nullable=true)
     */
    private $addressPersonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_personne", type="string", length=30, nullable=true)
     */
    private $emailPersonne;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_totale", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTotale;

    /**
     * @var string
     *
     * @ORM\Column(name="liste_produits", type="string", length=200, nullable=false)
     */
    private $listeProduits;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDpersonne", referencedColumnName="id_personne")
     * })
     */
    private $idpersonne;


}
