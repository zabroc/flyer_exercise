<?php
declare(strict_types = 1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Region
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\ManyToMany(targetEntity: Flyer::class, mappedBy: 'regions')]
    private Collection $flyers;

    public function __construct()
    {
        $this->flyers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFlyers(): Collection
    {
        return $this->flyers;
    }

    public function addFlyer(Flyer $flyer): void
    {
        if (!$this->flyers->contains($flyer)) {
            $this->flyers->add($flyer);
            $flyer->addRegion($this);
        }
    }

    public function removeFlyer(Flyer $flyer): void
    {
        if ($this->flyers->contains($flyer)) {
            $this->flyers->removeElement($flyer);
            $flyer->removeRegion($this);
        }
    }
}