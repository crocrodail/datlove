<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagesRepository::class)
 */
class Messages
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
    private $user_sender;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_recever;

    /**
     * @ORM\Column(type="string", length=5000)
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserSender(): ?int
    {
        return $this->user_sender;
    }

    public function setUserSender(int $user_sender): self
    {
        $this->user_sender = $user_sender;

        return $this;
    }

    public function getUserRecever(): ?int
    {
        return $this->user_recever;
    }

    public function setUserRecever(int $user_recever): self
    {
        $this->user_recever = $user_recever;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

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
