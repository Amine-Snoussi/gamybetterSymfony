<?php /** @noinspection ALL */

namespace App\Entity;

use App\Repository\CoursDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursDetailsRepository::class)
 */
class CoursDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cours::class, inversedBy="coursDetails")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="coursDetails")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

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
}
