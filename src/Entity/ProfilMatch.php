<?php

namespace App\Entity;

use App\Repository\ProfilMatchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilMatchRepository::class)
 */
class ProfilMatch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_one;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_two;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserOne(): ?int
    {
        return $this->user_one;
    }

    public function setUserOne(int $user_one): self
    {
        $this->user_one = $user_one;

        return $this;
    }

    public function getUserTwo(): ?int
    {
        return $this->user_two;
    }

    public function setUserTwo(int $user_two): self
    {
        $this->user_two = $user_two;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
