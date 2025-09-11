<?php

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;

trait TimestanpableTrait
{
    #[ORM\Column()]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column()]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getCreatedAt(): ?\DateTimeImmutable {
        return $this->createdAt;
    }

    #[ORM\PrePersist]// ← C’est la clé pour que cette méthode soit appelée avant la création
    public function setCreatedAt(): void {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getUpdatedAt(): ?\DateTimeImmutable {
        return $this->updatedAt;
    }

    #[ORM\PreUpdate]// ← C’est la clé pour que cette méthode soit appelée avant la mise à jour
    #[ORM\PrePersist]// ← C’est la clé pour que cette méthode soit appelée avant la création
    public function setUpdatedAt(): void {
        $this->updatedAt = new \DateTimeImmutable();
    }
}