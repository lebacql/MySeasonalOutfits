<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Answer;

class ApiAnswersController extends AbstractController
{
    
    #[Route('/api/answers', name: 'api_answers', methods: ['GET'])]
    public function showAnswers(ManagerRegistry $doctrine): JsonResponse 
    {
        $repository = $doctrine->getRepository(Answer::class);   
        $answers = $repository->findAll();

        return $this->json($answers);

    }
}