<?php

namespace App\Entity;

use App\Repository\ExpressionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExpressionRepository::class)
 */
class Expression
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPrivate;

    /**
     * @ORM\Column(type="text")
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=ExpressionInclude::class, mappedBy="expression", orphanRemoval=true)
     */
    private $includes;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="expressions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function __construct()
    {
        $this->includes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsPrivate(): ?bool
    {
        return $this->isPrivate;
    }

    public function setIsPrivate(bool $isPrivate): self
    {
        $this->isPrivate = $isPrivate;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|ExpressionInclude[]
     */
    public function getIncludes(): Collection
    {
        return $this->includes;
    }

    public function addInclude(ExpressionInclude $include): self
    {
        if (!$this->includes->contains($include)) {
            $this->includes[] = $include;
            $include->setExpression($this);
        }

        return $this;
    }

    public function removeInclude(ExpressionInclude $include): self
    {
        if ($this->includes->removeElement($include)) {
            // set the owning side to null (unless already changed)
            if ($include->getExpression() === $this) {
                $include->setExpression(null);
            }
        }

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
