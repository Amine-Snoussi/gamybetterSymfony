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
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateCommande = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_personne", type="string", length=70, nullable=true)
     */
    private $nomPersonne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address_personne", type="string", length=50, nullable=true, options={"default"="No Client Adress"})
     */
    private $addressPersonne = 'No Client Adress';

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_personne", type="string", length=60, nullable=true)
     */
    private $emailPersonne;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix_totale", type="float", precision=6, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $prixTotale = 0.00;

    /**
     * @var int|null
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     */
    private $discount = '0';

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDpersonne", referencedColumnName="id_personne")
     * })
     */
    private $idpersonne;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produit", inversedBy="idCommande")
     * @ORM\JoinTable(name="panier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_commande", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="itemCode", referencedColumnName="itemCode")
     *   }
     * )
     */
    private $itemcode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->itemcode = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
