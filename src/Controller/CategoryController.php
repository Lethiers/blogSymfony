<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }


    #[Route('/showCat/{id}', name: 'app_showCat')]
    public function category(CategoryRepository $categoryRepository, $id): Response
    {
        $category = $categoryRepository->find($id);
        // dd($category);
        return $this->render('showCategory/index.html.twig', [
            'category' => $category,
        ]);
    }
}
