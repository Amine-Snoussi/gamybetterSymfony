<?php /** @noinspection ALL */

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="veillez spécifier une durée")
     * @ORM\Column(type="time", nullable=true)
     */
    private $duree;

    /**
     * @Assert\NotBlank(message="veillez spécifier une date")
     * @Assert\Date(message = "La date n'est pas valide.")
     * @Assert\GreaterThan("today")
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @Assert\NotBlank(message="veillez entrer le nom du jeu")
     * @ORM\Column(type="string", length=255)
     */
    private $jeu;

    /**
     * @Assert\NotBlank(message="veillez entrer une catégorie")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categorie;

    /**
     * @Assert\PositiveOrZero(message="entrez un prix supérieur à 0")
     * @Assert\NotBlank(message="veillez entrer un prix non null")
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @Assert\NotBlank(message="veillez choisir un utilisateur")
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sessions")
     */
    private $user;

    /**
     * @Assert\NotBlank(message="veillez entrer un nom de session")
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="session")
     */
    private $cours_related;

    public function __construct()
    {
        $this->cours_related = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getJeu(): ?string
    {
        return $this->jeu;
    }

    public function setJeu(string $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours_related;
    }

    public function addCours(Cours $coursRelated): self
    {
        if (!$this->cours_related->contains($coursRelated)) {
            $this->cours_related[] = $coursRelated;
            $coursRelated->setSession($this);
        }

        return $this;
    }

    public function removeCours(Cours $coursRelated): self
    {
        if ($this->cours_related->removeElement($coursRelated)) {
            // set the owning side to null (unless already changed)
            if ($coursRelated->getSession() === $this) {
                $coursRelated->setSession(null);
            }
        }

        return $this;
    }


}
