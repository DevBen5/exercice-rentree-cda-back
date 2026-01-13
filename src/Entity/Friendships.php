<?php

namespace App\Entity;

use App\Repository\FriendshipsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FriendshipsRepository::class)]
class Friendships
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $creation_date = null;

    #[ORM\Column]
    private ?int $user1_id = null;

    #[ORM\Column]
    private ?int $user2_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate(): ?\DateTime
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTime $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getUser1Id(): ?int
    {
        return $this->user1_id;
    }

    public function setUser1Id(int $user1_id): static
    {
        $this->user1_id = $user1_id;

        return $this;
    }

    public function getUser2Id(): ?int
    {
        return $this->user2_id;
    }

    public function setUser2Id(int $user2_id): static
    {
        $this->user2_id = $user2_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
