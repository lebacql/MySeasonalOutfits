<?php

namespace App\Entity;

use App\Repository\OutfitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OutfitRepository::class)]
class Outfit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $topImg = null;

    #[ORM\Column(length: 255)]
    private ?string $topBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $topPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $topLink = null;

    #[ORM\Column(length: 255)]
    private ?string $bottomImg = null;

    #[ORM\Column(length: 255)]
    private ?string $bottomBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $bottomPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $bottomLink = null;

    #[ORM\Column(length: 255)]
    private ?string $shoesImg = null;

    #[ORM\Column(length: 255)]
    private ?string $shoesBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $shoesPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $shoesLink = null;

    #[ORM\Column(length: 255)]
    private ?string $accessoriesImg = null;

    #[ORM\Column(length: 255)]
    private ?string $accessoriesBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $accessoriesPrice = null;

    #[ORM\Column(length: 255)]
    private ?string $accessoriesLink = null;

    #[ORM\OneToMany(mappedBy: 'outfit', targetEntity: Proposal::class)]
    private Collection $proposals;

    public function __construct()
    {
        $this->proposals = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTopImg(): ?string
    {
        return $this->topImg;
    }

    public function setTopImg(string $topImg): self
    {
        $this->topImg = $topImg;

        return $this;
    }

    public function getTopBrand(): ?string
    {
        return $this->topBrand;
    }

    public function setTopBrand(string $topBrand): self
    {
        $this->topBrand = $topBrand;

        return $this;
    }

    public function getTopPrice(): ?string
    {
        return $this->topPrice;
    }

    public function setTopPrice(string $topPrice): self
    {
        $this->topPrice = $topPrice;

        return $this;
    }

    public function getTopLink(): ?string
    {
        return $this->topLink;
    }

    public function setTopLink(string $topLink): self
    {
        $this->topLink = $topLink;

        return $this;
    }

    public function getBottomImg(): ?string
    {
        return $this->bottomImg;
    }

    public function setBottomImg(string $bottomImg): self
    {
        $this->bottomImg = $bottomImg;

        return $this;
    }

    public function getBottomBrand(): ?string
    {
        return $this->bottomBrand;
    }

    public function setBottomBrand(string $bottomBrand): self
    {
        $this->bottomBrand = $bottomBrand;

        return $this;
    }

    public function getBottomPrice(): ?string
    {
        return $this->bottomPrice;
    }

    public function setBottomPrice(string $bottomPrice): self
    {
        $this->bottomPrice = $bottomPrice;

        return $this;
    }

    public function getBottomLink(): ?string
    {
        return $this->bottomLink;
    }

    public function setBottomLink(string $bottomLink): self
    {
        $this->bottomLink = $bottomLink;

        return $this;
    }

    public function getShoesImg(): ?string
    {
        return $this->shoesImg;
    }

    public function setShoesImg(string $shoesImg): self
    {
        $this->shoesImg = $shoesImg;

        return $this;
    }

    public function getShoesBrand(): ?string
    {
        return $this->shoesBrand;
    }

    public function setShoesBrand(string $shoesBrand): self
    {
        $this->shoesBrand = $shoesBrand;

        return $this;
    }

    public function getShoesPrice(): ?string
    {
        return $this->shoesPrice;
    }

    public function setShoesPrice(string $shoesPrice): self
    {
        $this->shoesPrice = $shoesPrice;

        return $this;
    }

    public function getShoesLink(): ?string
    {
        return $this->shoesLink;
    }

    public function setShoesLink(string $shoesLink): self
    {
        $this->shoesLink = $shoesLink;

        return $this;
    }

    public function getAccessoriesImg(): ?string
    {
        return $this->accessoriesImg;
    }

    public function setAccessoriesImg(string $accessoriesImg): self
    {
        $this->accessoriesImg = $accessoriesImg;

        return $this;
    }

    public function getAccessoriesBrand(): ?string
    {
        return $this->accessoriesBrand;
    }

    public function setAccessoriesBrand(string $accessoriesBrand): self
    {
        $this->accessoriesBrand = $accessoriesBrand;

        return $this;
    }

    public function getAccessoriesPrice(): ?string
    {
        return $this->accessoriesPrice;
    }

    public function setAccessoriesPrice(string $accessoriesPrice): self
    {
        $this->accessoriesPrice = $accessoriesPrice;

        return $this;
    }

    public function getAccessoriesLink(): ?string
    {
        return $this->accessoriesLink;
    }

    public function setAccessoriesLink(string $accessoriesLink): self
    {
        $this->accessoriesLink = $accessoriesLink;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return Collection<int, Proposal>
     */
    public function getProposals(): Collection
    {
        return $this->proposals;
    }

    public function addProposal(Proposal $proposal): self
    {
        if (!$this->proposals->contains($proposal)) {
            $this->proposals->add($proposal);
            $proposal->setOutfit($this);
        }

        return $this;
    }

    public function removeProposal(Proposal $proposal): self
    {
        if ($this->proposals->removeElement($proposal)) {
            // set the owning side to null (unless already changed)
            if ($proposal->getOutfit() === $this) {
                $proposal->setOutfit(null);
            }
        }

        return $this;
    }

}
