<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="fk_personne_publication", columns={"id_personne"})})
 * @ORM\Entity
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_publication", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPublication;

    /**
     * @var int
     *
     * @ORM\Column(name="id_personne", type="integer", nullable=false)
     */
    private $idPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="publication", type="string", length=250, nullable=false)
     */
    private $publication;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_commentaire", type="integer", nullable=false)
     */
    private $nbrCommentaire;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;


}
