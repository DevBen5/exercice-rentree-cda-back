<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Post;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\SharedResourcesRepository;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: SharedResourcesRepository::class)]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/v1/resources',
            denormalizationContext: ['groups' => 'sharedResourcesNew:item']),
        new Get(
            uriTemplate: '/v1/resources/{id}',
            normalizationContext: ['groups' => 'sharedResourcesId:item']),
    ],
)]
class SharedResources
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(referencedColumnName: 'id', unique: true)]
    public ResourceAccess $resourceAccess;

    #[ORM\Column(length: 255)]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['sharedResourcesNew:item'])]
    private ?string $resource_type = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?string $path = null;

    #[ORM\Column(length: 255)]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?string $mime_type = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?int $size = null;

    #[ORM\Column]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?bool $is_public = null;

    #[ORM\Column]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?int $creator_id = null;

    #[ORM\Column]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?int $parent_id = null;

    #[ORM\Column]
    #[Groups(['sharedResourcesNew:item', 'sharedResourcesId:item'])]
    private ?string $metadata = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getResourceType(): ?string
    {
        return $this->resource_type;
    }

    public function setResourceType(string $resource_type): static
    {
        $this->resource_type = $resource_type;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    public function setMimeType(string $mime_type): static
    {
        $this->mime_type = $mime_type;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function isPublic(): ?bool
    {
        return $this->is_public;
    }

    public function setIsPublic(bool $is_public): static
    {
        $this->is_public = $is_public;

        return $this;
    }

    public function getCreatorId(): ?int
    {
        return $this->creator_id;
    }

    public function setCreatorId(int $creator_id): static
    {
        $this->creator_id = $creator_id;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parent_id): static
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function getMetadata(): string
    {
        return $this->metadata;
    }

    public function setMetadata(string $metadata): static
    {
        $this->metadata = $metadata;

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
