<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Personne;
use App\Entity\Session;

/**
 * Cours
 *
 * @ORM\Table(name="cours", indexes={@ORM\Index(name="cours_session", columns={"id_session"}), @ORM\Index(name="cours_coach", columns={"id_coach"})})
 * @ORM\Entity
 */
class Cours
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
     * @var string
     *
     * @ORM\Column(name="email_coach", type="string", length=50, nullable=false)
     */
    private $emailCoach;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50, nullable=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="jeu", type="string", length=50, nullable=false)
     */
    private $jeu;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="lien_session", type="string", length=200, nullable=false)
     */
    private $lienSession;

    /**
     * @var string
     *
     * @ORM\Column(name="liste_personnes", type="string", length=200, nullable=false)
     */
    private $listePersonnes;

    /**
     * @var \Session
     *
     * @ORM\ManyToOne(targetEntity="Session")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_session", referencedColumnName="id")
     * })
     */
    private $idSession;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coach", referencedColumnName="id_personne")
     * })
     */
    private $idCoach;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmailCoach(): string
    {
        return $this->emailCoach;
    }

    /**
     * @param string $emailCoach
     */
    public function setEmailCoach(string $emailCoach): void
    {
        $this->emailCoach = $emailCoach;
    }

    /**
     * @return string
     */
    public function getCategorie(): string
    {
        return $this->categorie ? $this->categorie : 'none';
    }

    /**
     * @param string $categorie
     */
    public function setCategorie(string $categorie): void
    {
        $this->categorie = $categorie;
    }

    /**
     * @return string
     */
    public function getJeu(): string
    {
        return $this->jeu ? $this->jeu : 'none';
    }

    /**
     * @param string $jeu
     */
    public function setJeu(string $jeu): void
    {
        $this->jeu = $jeu;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix ? $this->prix : 0;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getLienSession(): string
    {
        return $this->lienSession ? $this->lienSession : 'none';
    }

    /**
     * @param string $lienSession
     */
    public function setLienSession(string $lienSession): void
    {
        $this->lienSession = $lienSession;
    }

    /**
     * @return string
     */
    public function getListePersonnes(): string
    {
        return $this->listePersonnes ? $this->listePersonnes : 'none';
    }

    /**
     * @param string $listePersonnes
     */
    public function setListePersonnes(string $listePersonnes): void
    {
        $this->listePersonnes = $listePersonnes;
    }

    /**
     * @return Session
     */
    public function getIdSession(): Session
    {
        return $this->getIdSession();
    }

    /**
     * @param Session $idSession
     */
    public function setIdSession(Session $idSession): void
    {
        $this->idSession = $idSession;
    }

    /**
     * @return Personne
     */
    public function getIdCoach(): Personne
    {
        return $this->getIdCoach();
    }

    /**
     * @param Personne $idCoach
     */
    public function setIdCoach(Personne $idCoach): void
    {
        $this->idCoach = $idCoach;
    }


}
