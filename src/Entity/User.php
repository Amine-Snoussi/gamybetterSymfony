<?php /** @noinspection ALL */

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="user")
     */
    private $cours;

    /**
     * @ORM\OneToMany(targetEntity=Session::class, mappedBy="user")
     */
    private $sessions;

    /**
     * @ORM\OneToMany(targetEntity=CoursDetails::class, mappedBy="user")
     */
    private $coursDetails;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->coursDetails = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setUser($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getUser() === $this) {
                $cour->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setUser($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getUser() === $this) {
                $session->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CoursDetails>
     */
    public function getCoursDetails(): Collection
    {
        return $this->coursDetails;
    }

    public function addCoursDetail(CoursDetails $coursDetail): self
    {
        if (!$this->coursDetails->contains($coursDetail)) {
            $this->coursDetails[] = $coursDetail;
            $coursDetail->setUser($this);
        }

        return $this;
    }

    public function removeCoursDetail(CoursDetails $coursDetail): self
    {
        if ($this->coursDetails->removeElement($coursDetail)) {
            // set the owning side to null (unless already changed)
            if ($coursDetail->getUser() === $this) {
                $coursDetail->setUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getPrenom().' '.$this->getNom();
    }


}
