<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'categories')]
    #[Groups(["article"])]
    private Collection $articles;

    // public function __construct()
    // {
    //     $this->articles = new ArrayCollection();
    // }


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

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    // /**
    //  * @return Collection<int, Article>
    //  */
    // public function getArticles(): Collection
    // {
    //     return $this->articles;
    // }

    // public function addArticle(Article $article): self
    // {
    //     if (!$this->articles->contains($article)) {
    //         $this->articles->add($article);
    //         $article->addCategory($this);
    //     }

    //     return $this;
    // }

    // public function removeArticle(Article $article): self
    // {
    //     if ($this->articles->removeElement($article)) {
    //         $article->removeCategory($this);
    //     }

    //     return $this;
    // }
}
