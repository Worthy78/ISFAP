<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilieresRepository")
 */
class Filieres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mensualite_demi_bourse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mensualite_bourse_entiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mensualite_nom_boursier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="filieres")
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getInscription(): ?string
    {
        return $this->inscription;
    }

    public function setInscription(string $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getMensualiteDemiBourse(): ?string
    {
        return $this->mensualite_demi_bourse;
    }

    public function setMensualiteDemiBourse(string $mensualite_demi_bourse): self
    {
        $this->mensualite_demi_bourse = $mensualite_demi_bourse;

        return $this;
    }

    public function getMensualiteBourseEntiere(): ?string
    {
        return $this->mensualite_bourse_entiere;
    }

    public function setMensualiteBourseEntiere(string $mensualite_bourse_entiere): self
    {
        $this->mensualite_bourse_entiere = $mensualite_bourse_entiere;

        return $this;
    }

    public function getMensualiteNomBoursier(): ?string
    {
        return $this->mensualite_nom_boursier;
    }

    public function setMensualiteNomBoursier(string $mensualite_nom_boursier): self
    {
        $this->mensualite_nom_boursier = $mensualite_nom_boursier;

        return $this;
    }

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
