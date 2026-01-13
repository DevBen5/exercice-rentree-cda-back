<?php

namespace App\Entity;

use App\Repository\NotificationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationsRepository::class)]
class Notifications
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column]
    private ?bool $notification_read = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $read_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $expires_at = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $action_url = null;

    #[ORM\Column]
    private ?int $recipient_id = null;

    #[ORM\Column]
    private ?int $sender_id = null;

    #[ORM\Column]
    private ?int $relation_id = null;

    #[ORM\Column]
    private array $metadata = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updates_at = null;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function isNotificationRead(): ?bool
    {
        return $this->notification_read;
    }

    public function setNotificationRead(bool $notification_read): static
    {
        $this->notification_read = $notification_read;

        return $this;
    }

    public function getReadAt(): ?\DateTimeImmutable
    {
        return $this->read_at;
    }

    public function setReadAt(\DateTimeImmutable $read_at): static
    {
        $this->read_at = $read_at;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expires_at;
    }

    public function setExpiresAt(\DateTimeImmutable $expires_at): static
    {
        $this->expires_at = $expires_at;

        return $this;
    }

    public function getActionUrl(): ?string
    {
        return $this->action_url;
    }

    public function setActionUrl(string $action_url): static
    {
        $this->action_url = $action_url;

        return $this;
    }

    public function getRecipientId(): ?int
    {
        return $this->recipient_id;
    }

    public function setRecipientId(int $recipient_id): static
    {
        $this->recipient_id = $recipient_id;

        return $this;
    }

    public function getSenderId(): ?int
    {
        return $this->sender_id;
    }

    public function setSenderId(int $sender_id): static
    {
        $this->sender_id = $sender_id;

        return $this;
    }

    public function getRelationId(): ?int
    {
        return $this->relation_id;
    }

    public function setRelationId(int $relation_id): static
    {
        $this->relation_id = $relation_id;

        return $this;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): static
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

    public function getUpdatesAt(): ?\DateTimeImmutable
    {
        return $this->updates_at;
    }

    public function setUpdatesAt(\DateTimeImmutable $updates_at): static
    {
        $this->updates_at = $updates_at;

        return $this;
    }
}
