<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?quiz $quiz = null;

    #[ORM\Column(length: 255)]
    private ?string $answerA = null;

    #[ORM\Column(length: 255)]
    private ?string $answerB = null;

    #[ORM\Column(length: 255)]
    private ?string $answerC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $answerD = null;

    #[ORM\ManyToMany(targetEntity: userAnswer::class)]
    private Collection $userAnswer;

    public function __construct()
    {
        $this->userAnswer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?quiz $quiz): self
    {
        $this->quiz = $quiz;

        return $this;
    }

    public function getAnswerA(): ?string
    {
        return $this->answerA;
    }

    public function setAnswerA(string $answerA): self
    {
        $this->answerA = $answerA;

        return $this;
    }

    public function getAnswerB(): ?string
    {
        return $this->answerB;
    }

    public function setAnswerB(string $answerB): self
    {
        $this->answerB = $answerB;

        return $this;
    }

    public function getAnswerC(): ?string
    {
        return $this->answerC;
    }

    public function setAnswerC(string $answerC): self
    {
        $this->answerC = $answerC;

        return $this;
    }

    public function getAnswerD(): ?string
    {
        return $this->answerD;
    }

    public function setAnswerD(?string $answerD): self
    {
        $this->answerD = $answerD;

        return $this;
    }

    /**
     * @return Collection<int, userAnswer>
     */
    public function getUserAnswer(): Collection
    {
        return $this->userAnswer;
    }

    public function addUserAnswer(userAnswer $userAnswer): self
    {
        if (!$this->userAnswer->contains($userAnswer)) {
            $this->userAnswer->add($userAnswer);
        }

        return $this;
    }

    public function removeUserAnswer(userAnswer $userAnswer): self
    {
        $this->userAnswer->removeElement($userAnswer);

        return $this;
    }
}
