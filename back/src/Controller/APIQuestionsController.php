<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Question;

class ApiQuestionsController extends AbstractController
{
    
    #[Route('/api/questions', name: 'api_questions', methods: ['GET'])]
    public function showQuestions(ManagerRegistry $doctrine): JsonResponse 
    {
        $repository = $doctrine->getRepository(Question::class);   
        $questions = $repository->findAll();

        return $this->json($questions);

    }
}