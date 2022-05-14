<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use App\Repository\PersonneRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\Common\Collections\ArrayCollection;




/**
 * Personne
 *
 * @ORM\Table(name="personne")
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 *  message = "l'email que vous avez tapez existe déjà !"
 * )
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
      private $pseudo;



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
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;

      /**
       * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="personne",cascade={"all"},orphanRemoval=true)
       */
      private $reclamations;




     

   
      
    
      /**
       * @ORM\Column(name="mot_de_passe" , type="string", length=255)
       * @Assert\Length(min="8",minMessage="Votre mot de passe doit faire minimum 8 caractères")
       */
      private $password;

    /**
       * @var string
       * @Assert\NotBlank
       * @ORM\Column(name ="email",type="string", length=255)
       * @Assert\Email()
       */
      private $email;

        /**
     * @var \DateTime
     *@Assert\NotBlank
     * @Assert\Type("\DateTime")
     * @ORM\Column(name="DateOfBirth", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateofbirth;

    /**
       * @ORM\Column(name="role", type="json")
       */
      private $roles = [];

    /**
       * @ORM\Column(name="Image", type="string", length=255)
       */
      private $image;

    

     /**
     * @ORM\Column(name="activation", type="string", length=50, nullable=true)

     */
    private $activation_token;

    /**
     * @ORM\Column(name="reset", type="string", length=50, nullable=true)

     */
    private $reset_token;

        /**
       * @return mixed
       */
      public function getIdPersonne()
      {
          return $this->idPersonne;
      }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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


    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(?\DateTimeInterface $dateofbirth): self
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
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
    
    public function getResetToken(): ?string
    {
        return $this->reset_token;
    }

    public function setResetToken(?string $reset_token): self
    {
        $this->reset_token = $reset_token;

        return $this;
    }

    public function getActivationToken(): ?string
    {
        return $this->activation_token;
    }

    public function setActivationToken(?string $activation_token): self
    {
        $this->activation_token = $activation_token;

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

    public function getContact(): ?int
    {
        return $this->contact;
    }

    public function setContact(int $contact): self
    {
        $this->contact = $contact;

        return $this;
    }


    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    } 

      /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

      /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }


  

    public function eraseCredentials(){}
    
}
