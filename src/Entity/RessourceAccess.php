<?php

namespace App\Entity;

use App\Repository\RessourceAccessRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceAccessRepository::class)]
class RessourceAccess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $access_type = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $granted_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $exprires_at = null;

    #[ORM\Column]
    private ?int $ressource_id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column]
    private ?int $granted_by_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccessType(): ?string
    {
        return $this->access_type;
    }

    public function setAccessType(string $access_type): static
    {
        $this->access_type = $access_type;

        return $this;
    }

    public function getGrantedAt(): ?\DateTimeImmutable
    {
        return $this->granted_at;
    }

    public function setGrantedAt(\DateTimeImmutable $granted_at): static
    {
        $this->granted_at = $granted_at;

        return $this;
    }

    public function getExpriresAt(): ?\DateTimeImmutable
    {
        return $this->exprires_at;
    }

    public function setExpriresAt(\DateTimeImmutable $exprires_at): static
    {
        $this->exprires_at = $exprires_at;

        return $this;
    }

    public function getRessourceId(): ?int
    {
        return $this->ressource_id;
    }

    public function setRessourceId(int $ressource_id): static
    {
        $this->ressource_id = $ressource_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getGrantedById(): ?int
    {
        return $this->granted_by_id;
    }

    public function setGrantedById(int $granted_by_id): static
    {
        $this->granted_by_id = $granted_by_id;

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
