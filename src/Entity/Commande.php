<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_com_pers", columns={"IDpersonne"})})
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateCommande = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="nom_personne", type="string", length=60, nullable=false)
     */
    private $nomPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="address_personne", type="string", length=100, nullable=false)
     */
    private $addressPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="email_personne", type="string", length=100, nullable=false)
     */
    private $emailPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_totale", type="decimal", precision=6, scale=3, nullable=false)
     */
    private $prixTotale;

    /**
     * @var int
     *
     * @ORM\Column(name="discount", type="integer", nullable=false)
     */
    private $discount;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDpersonne", referencedColumnName="id_personne")
     * })
     */
    private $idpersonne;

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getNomPersonne(): ?string
    {
        return $this->nomPersonne;
    }

    public function setNomPersonne(string $nomPersonne): self
    {
        $this->nomPersonne = $nomPersonne;

        return $this;
    }

    public function getAddressPersonne(): ?string
    {
        return $this->addressPersonne;
    }

    public function setAddressPersonne(string $addressPersonne): self
    {
        $this->addressPersonne = $addressPersonne;

        return $this;
    }

    public function getEmailPersonne(): ?string
    {
        return $this->emailPersonne;
    }

    public function setEmailPersonne(string $emailPersonne): self
    {
        $this->emailPersonne = $emailPersonne;

        return $this;
    }

    public function getPrixTotale(): ?string
    {
        return $this->prixTotale;
    }

    public function setPrixTotale(string $prixTotale): self
    {
        $this->prixTotale = $prixTotale;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getIdpersonne(): ?Personne
    {
        return $this->idpersonne;
    }

    public function setIdpersonne(?Personne $idpersonne): self
    {
        $this->idpersonne = $idpersonne;

        return $this;
    }


}
