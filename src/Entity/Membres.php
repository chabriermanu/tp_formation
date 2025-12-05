<?php

namespace App\Entity;

use App\Repository\MembresRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MembresRepository::class)]
class Membres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_membre = null;

    #[ORM\Column(length: 15)]
    #[Assert\NotBlank(message: "Le nom ne peut pas être vide")]
    #[Assert\Length(
        min: 2,
        max: 15,
        minMessage: "Le nom doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères"
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-ZÀ-ÿ\s'-]+$/u",
        message: "Le nom ne peut contenir que des lettres, espaces, apostrophes et tirets"
    )]
    private ?string $nom_membre = null;

   #[ORM\Column(length: 15)]
    #[Assert\NotBlank(message: "Le login ne peut pas être vide")]
    #[Assert\Length(
        min: 2,
        max: 15,
        minMessage: "Le login doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le login ne peut pas dépasser {{ limit }} caractères"
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-ZÀ-ÿ\s'-]+$/u",
        message: "Le login ne peut contenir que des lettres, espaces, apostrophes et tirets"
    )]
    private ?string $login_membre = null;

    public function getIdMembre(): ?int
    {
        return $this->id_membre;
    }

    public function getNomMembre(): ?string
    {
        return $this->nom_membre;
    }

    public function setNomMembre(?string $nom_membre): static
    {
        $this->nom_membre = $nom_membre;

        return $this;
    }

    public function getLoginMembre(): ?string
    {
        return $this->login_membre;
    }

    public function setLoginMembre(?string $login_membre): static
    {
        $this->login_membre = $login_membre;

        return $this;
    }
}
