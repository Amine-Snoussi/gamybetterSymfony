<?php /** @noinspection ALL */

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("cours")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="veillez entrer un nom")
     * @ORM\Column(type="string", length=255)
     * @Groups("cours")
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="veillez entrer une catégorie")
     * @ORM\Column(type="string", length=255)
     * @Groups("cours")
     */
    private $categorie;

    /**
     * @Assert\NotBlank(message="veillez entrer le nom du jeu")
     * @ORM\Column(type="string", length=255)
     * @Groups("cours")
     */
    private $jeu;

    /**
     * @Assert\PositiveOrZero(message="entrez un prix supérieur à 0")
     * @Assert\NotBlank(message="veillez entrer un prix non null")
     * @ORM\Column(type="float")
     * @Groups("cours")
     */
    private $prix;

    /**
     * @Assert\NotBlank(message="veillez choisir un utilisateur")
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("cours")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity=Session::class, inversedBy="cours_related")
     */
    private $session;

    /**
     * mimeTypes = {"image/jpeg", "image/png", "image/jpg"},
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fileName;

    /**
     * mimeTypes = {"video/mp4"}
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups("cours")
     */
    private $rating;


    public function __construct()
    {
    }


    public function getId(): ?int
    {
        return $this->id;
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


    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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


    public function __toString()
    {
        return $this->getNom();
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session ? $session : null;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video ? $video : "";

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function calcTotalPrice(): float
    {
        return $this->quantity * $this->price;
    }


}
