<?php

namespace App\Entity;

use App\Repository\GroupMembersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupMembersRepository::class)]
class GroupMembers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $join_date = null;

    #[ORM\Column(length: 20)]
    private ?string $member_status = null;

    #[ORM\Column(length: 20)]
    private ?string $member_role = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column]
    private ?int $group_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoinDate(): ?\DateTime
    {
        return $this->join_date;
    }

    public function setJoinDate(\DateTime $join_date): static
    {
        $this->join_date = $join_date;

        return $this;
    }

    public function getMemberStatus(): ?string
    {
        return $this->member_status;
    }

    public function setMemberStatus(string $member_status): static
    {
        $this->member_status = $member_status;

        return $this;
    }

    public function getMemberRole(): ?string
    {
        return $this->member_role;
    }

    public function setMemberRole(string $member_role): static
    {
        $this->member_role = $member_role;

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

    public function getGroupId(): ?int
    {
        return $this->group_id;
    }

    public function setGroupId(int $group_id): static
    {
        $this->group_id = $group_id;

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
