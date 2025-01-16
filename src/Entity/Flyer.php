<?php
declare(strict_types = 1);


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Flyer
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $pdfUrl;

    #[ORM\ManyToMany(targetEntity: Region::class, inversedBy: 'flyers')]
    private Collection $regions;

    public function __construct()
    {
        $this->regions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPdfUrl(): string
    {
        return $this->pdfUrl;
    }

    public function setPdfUrl(string $pdfUrl): void
    {
        $this->pdfUrl = $pdfUrl;
    }
    public function getRegions(): Collection
{
    return $this->regions;
}

public function addRegion(Region $region): void
{
    if (!$this->regions->contains($region)) {
        $this->regions->add($region);
        $region->addFlyer($this);
    }
}

public function removeRegion(Region $region): void
{
    if ($this->regions->contains($region)) {
        $this->regions->removeElement($region);
        $region->removeFlyer($this);
    }
}

}