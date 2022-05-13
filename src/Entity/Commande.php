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

    /**
     * @return int
     */
    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    /**
     * @param int $idCommande
     */
    public function setIdCommande(int $idCommande): void
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return \DateTime
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * @param \DateTime $dateCommande
     */
    public function setDateCommande($dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return string
     */
    public function getNomPersonne(): ?string
    {
        return $this->nomPersonne;
    }

    /**
     * @param string $nomPersonne
     */
    public function setNomPersonne(string $nomPersonne): void
    {
        $this->nomPersonne = $nomPersonne;
    }

    /**
     * @return string
     */
    public function getAddressPersonne(): ?string
    {
        return $this->addressPersonne;
    }

    /**
     * @param string $addressPersonne
     */
    public function setAddressPersonne(string $addressPersonne): void
    {
        $this->addressPersonne = $addressPersonne;
    }

    /**
     * @return string
     */
    public function getEmailPersonne(): ?string
    {
        return $this->emailPersonne;
    }

    /**
     * @param string $emailPersonne
     */
    public function setEmailPersonne(string $emailPersonne): void
    {
        $this->emailPersonne = $emailPersonne;
    }

    /**
     * @return string
     */
    public function getPrixTotale(): ?string
    {
        return $this->prixTotale;
    }

    /**
     * @param string $prixTotale
     */
    public function setPrixTotale(string $prixTotale): void
    {
        $this->prixTotale = $prixTotale;
    }

    /**
     * @return int
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     */
    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return \Personne
     */
    public function getIdpersonne(): ?Personne
    {
        return $this->idpersonne;
    }

    /**
     * @param Personne $idpersonne
     */
    public function setIdpersonne(?Personne $idpersonne): void
    {
        $this->idpersonne = $idpersonne;
    }




}
