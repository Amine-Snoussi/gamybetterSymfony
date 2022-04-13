<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="itemCode", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $itemcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_produit", type="string", length=50, nullable=true)
     */
    private $nomProduit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=50, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="categorie", type="string", length=20, nullable=true)
     */
    private $categorie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prix_unitair", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $prixUnitair;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantite_stock", type="integer", nullable=true)
     */
    private $quantiteStock;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=50, nullable=true)
     */
    private $image;


}
