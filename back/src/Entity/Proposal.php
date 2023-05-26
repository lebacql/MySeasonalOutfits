<?php

namespace App\Entity;

use App\Repository\ProposalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProposalRepository::class)]
class Proposal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'proposals')]
    private ?Outfit $outfit = null;

    #[ORM\ManyToOne(inversedBy: 'proposals')]
    private ?Quiz $quiz = null;

    #[ORM\ManyToMany(targetEntity: Question::class, inversedBy: 'proposals')]
    private Collection $question;

    #[ORM\ManyToMany(targetEntity: Answer::class, inversedBy: 'proposals')]
    private Collection $answer;

    public function __construct()
    {
        $this->question = new ArrayCollection();
        $this->answer = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOutfit(): ?Outfit
    {
        return $this->outfit;
    }

    public function setOutfit(?Outfit $outfit): self
    {
        $this->outfit = $outfit;

        return $this;
    }

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz): self
    {
        $this->quiz = $quiz;

        return $this;
    }

    /**
     * @return Collection<int, Question>
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question->add($question);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        $this->question->removeElement($question);

        return $this;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswer(): Collection
    {
        return $this->answer;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answer->contains($answer)) {
            $this->answer->add($answer);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        $this->answer->removeElement($answer);

        return $this;
    }

}
