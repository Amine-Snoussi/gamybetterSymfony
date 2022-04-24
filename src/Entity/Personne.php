<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table(name="personne")
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
     * @var string
     *
     * @ORM\Column(name="nom_prenom_personne", type="string", length=255, nullable=false)
     */
    private $nomPrenomPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_personne", type="string", length=100, nullable=false)
     */
    private $adressePersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="email_personne", type="string", length=150, nullable=false)
     */
    private $emailPersonne;

    public function getIdPersonne(): ?int
    {
        return $this->idPersonne;
    }

    public function getNomPrenomPersonne(): ?string
    {
        return $this->nomPrenomPersonne;
    }

    public function setNomPrenomPersonne(string $nomPrenomPersonne): self
    {
        $this->nomPrenomPersonne = $nomPrenomPersonne;

        return $this;
    }

    public function getAdressePersonne(): ?string
    {
        return $this->adressePersonne;
    }

    public function setAdressePersonne(string $adressePersonne): self
    {
        $this->adressePersonne = $adressePersonne;

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


}
