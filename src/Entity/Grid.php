<?php

namespace App\Entity;

use App\Repository\GridRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GridRepository::class)]
class Grid
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::JSON)]
    private array $numbersequencearray = [];

    #[ORM\Column(length: 255)]
    private ?string $player = null;

    #[ORM\Column]
    private ?bool $isplayed = null;

    #[ORM\Column]
    private ?int $numberlucky = null;

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

    public function getNumbersequencearray(): array
    {
        return $this->numbersequencearray;
    }

    public function setNumbersequencearray(array $numbersequencearray): self
    {
        $this->numbersequencearray = $numbersequencearray;

        return $this;
    }


    public function getNumberlucky(): ?int
    {
        return $this->numberlucky;
    }

    public function setNumberlucky(int $numberlucky): self
    {
        $this->numberlucky = $numberlucky;

        return $this;
    }

    public function getPlayer(): ?string
    {
        return $this->player;
    }

    public function setPlayer(string $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function isIsplayed(): ?bool
    {
        return $this->isplayed;
    }

    public function setIsplayed(bool $isplayed): self
    {
        $this->isplayed = $isplayed;

        return $this;
    }


}
