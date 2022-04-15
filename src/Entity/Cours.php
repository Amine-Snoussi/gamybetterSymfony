<?php /** @noinspection ALL */

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @Assert\NotBlank(message="veillez entrer une catégorie")
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @Assert\NotBlank(message="veillez entrer le nom du jeu")
     * @ORM\Column(type="string", length=255)
     */
    private $jeu;

    /**
     * @Assert\PositiveOrZero(message="entrez un prix supérieur à 0")
     * @Assert\NotBlank(message="veillez entrer un prix non null")
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @Assert\NotBlank(message="veillez choisir un utilisateur")
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * @ORM\OneToMany(targetEntity=CoursDetails::class, mappedBy="cours")
     */
    private $coursDetails;

    /**
     * @ORM\ManyToOne(targetEntity=Session::class, inversedBy="cours_related")
     */
    private $session;

    public function __construct()
    {
        $this->coursDetails = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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


    /**
     * @return Collection<int, CoursDetails>
     */
    public function getCoursDetails(): Collection
    {
        return $this->coursDetails->matching($criteria);
    }

    public function addCoursDetail(CoursDetails $coursDetail): self
    {
        if (!$this->coursDetails->contains($coursDetail)) {
            $this->coursDetails[] = $coursDetail;
            $coursDetail->setCours($this);
        }

        return $this;
    }

    public function removeCoursDetail(CoursDetails $coursDetail): self
    {
        if ($this->coursDetails->removeElement($coursDetail)) {
            // set the owning side to null (unless already changed)
            if ($coursDetail->getCours() === $this) {
                $coursDetail->setCours(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getJeu();
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

        return $this;
    }



}
