<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Knojector\SteamAuthenticationBundle\User\AbstractSteamUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;

/**
 * @ORM\Entity()
 */
class User extends AbstractSteamUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Expression::class, mappedBy="owner", orphanRemoval=true)
     */
    private $expressions;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->roles = [];
        $this->expressions = new ArrayCollection();
    }
    
    /**
     * @return array
     */
    public function getRoles(): array
    {
        $roles = ['ROLE_USER'];
        foreach ($this->roles as $role) {
            $roles[] = new Role($role);
        }

        return $roles;
    }

    /**
     * @return Collection|Expression[]
     */
    public function getExpressions(): Collection
    {
        return $this->expressions;
    }

    public function addExpression(Expression $expression): self
    {
        if (!$this->expressions->contains($expression)) {
            $this->expressions[] = $expression;
            $expression->setOwner($this);
        }

        return $this;
    }

    public function removeExpression(Expression $expression): self
    {
        if ($this->expressions->removeElement($expression)) {
            // set the owning side to null (unless already changed)
            if ($expression->getOwner() === $this) {
                $expression->setOwner(null);
            }
        }

        return $this;
    }
}