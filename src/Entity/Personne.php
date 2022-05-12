<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Personne
 *
 * @ORM\Table(name="personne")
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 * @UniqueEntity(
 *  fields={"email"},
 *  message = "l'email que vous avez tapez existe déjà !"
 * )
 * 
 */
  class Personne implements UserInterface

{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ORM\Column(name="id_personne", type="integer", nullable=false)

     */
    private $idPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

      /**
       * @ORM\Column(name="username" , type="string", length=255)
       */
      private $username;

      /**
       * @ORM\Column(type="integer")
       */
      private $contact;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

      /**
       * @ORM\Column(name="mot_de_passe" , type="string", length=255)
       * @Assert\Length(min="8",minMessage="Votre mot de passe doit faire minimum 8 caractères")
       */
      private $password;

      /**
       * @Assert\EqualTo(propertyPath="password",message="vous n'avez pas tapez le même mot de passe")
       */
      public $confirm_password;

      /**
       * @ORM\Column(type="string", length=255)
       * @Assert\Email()
       */
      private $email;

      /**
       * @ORM\Column(type="string", length=255)
       */
      private $role;

      /**
       * @ORM\Column(type="string", length=500)
       */
      private $description;

      /**
       * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="personne",cascade={"all"},orphanRemoval=true)
       */
      private $reclamations;

      /**
       * @ORM\Column(type="string", length=255)
       */
      private $image;


      /**
       * @return mixed
       */
      public function getIdPersonne()
      {
          return $this->idPersonne;
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getContact(): ?int
    {
        return $this->contact;
    }

    public function setContact(int $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations[] = $reclamation;
            $reclamation->setPersonne($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getPersonne() === $this) {
                $reclamation->setPersonne(null);
            }
        }

        return $this;
    }
   

    public function eraseCredentials(){}
    
    public function getSalt(){}
    
    public function getRoles (){
        return ['ROLE_USER'];
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }


    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->id;
    }


  }
