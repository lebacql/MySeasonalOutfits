<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Category;

class ApiCategoryController extends AbstractController
{
    
    #[Route('/api/categories', name: 'api_categories', methods: ['GET'])]
    public function showCategory(ManagerRegistry $doctrine): JsonResponse 
    {
        $repository = $doctrine->getRepository(Category::class);   
        $category = $repository->findAll();

        return $this->json($category);

    }
}