<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Article;

class APIController extends AbstractController
{
    
    #[Route('/api/articles', name: 'api_articles', methods: ['GET'])]
    public function showArticles(ManagerRegistry $doctrine): JsonResponse 
    {
        $repository = $doctrine->getRepository(Article::class);   
        $articles = $repository->findAll();

        return $this->json($articles);

    }
}