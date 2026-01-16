<?php

namespace App\Entity;


use App\Entity\User;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Post;
use App\Entity\SharedResources;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use App\Repository\ResourceAccessRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ResourceAccessRepository::class)]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/v1/resources/{resourceId}/access',
            denormalizationContext: ['groups' => 'resourceAccessNew:item']),
    ],
    uriVariables: [
        'resourceId' => new Link(
            fromClass: SharedResources::class,
            toProperty: 'sharedResources'
        )
    ],
)]

class ResourceAccess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne]
    public SharedResources $sharedResources;

    #[ORM\Column(length: 255)]
    #[Groups(['resourceAccessNew:item'])]
    private ?string $access_type = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $granted_at = null;

    #[ORM\Column]
    #[Groups(['resourceAccessNew:item'])]
    private ?\DateTimeImmutable $expires_at = null;

    #[ORM\Column]
    #[Groups(['resourceAccessNew:item'])]
    private ?int $granted_by_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column]
    private Collection $user_id;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
    }

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
        return $this->expires_at;
    }

    public function setExpriresAt(\DateTimeImmutable $exprires_at): static
    {
        $this->expires_at = $exprires_at;

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

    /**
     * @return Collection<int, User>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): static
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
        }

        return $this;
    }

    public function removeUserId(User $userId): static
    {
        $this->user_id->removeElement($userId);

        return $this;
    }
}
