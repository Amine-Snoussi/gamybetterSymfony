<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_panier_pro_com", columns={"id_produit", "id_commande"})}, indexes={@ORM\Index(name="FK_24CC0DF23E314AE8", columns={"id_commande"}), @ORM\Index(name="IDX_24CC0DF2F7384557", columns={"id_produit"})})
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite_ordered", type="integer", nullable=false)
     */
    private $quantiteOrdered;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_unitaire", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $prixUnitaire;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produit", referencedColumnName="id_produit")
     * })
     */
    private $idProduit;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     * })
     */
    private $idCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantiteOrdered(): ?int
    {
        return $this->quantiteOrdered;
    }

    public function setQuantiteOrdered(int $quantiteOrdered): self
    {
        $this->quantiteOrdered = $quantiteOrdered;

        return $this;
    }

    public function getPrixUnitaire(): ?string
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(string $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->idCommande;
    }

    public function setIdCommande(?Commande $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }


}
