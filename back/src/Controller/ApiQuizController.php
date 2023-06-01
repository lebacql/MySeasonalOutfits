<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Quiz;

class ApiQuizController extends AbstractController
{
    
    #[Route('/api/quiz', name: 'api_quiz', methods: ['GET'])]
    public function showQuiz(ManagerRegistry $doctrine): JsonResponse 
    {
        $repository = $doctrine->getRepository(Quiz::class);   
        $quiz = $repository->findAll();

        return $this->json($quiz);

    }
}