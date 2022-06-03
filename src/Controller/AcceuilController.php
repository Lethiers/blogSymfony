<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        // dd($articles);
        return $this->render('acceuil/index.html.twig',[
            'articles' => $articles,
        ]);
    }

    #[Route('/show/{id}', name: 'app_show')]
    public function article(int $id, ArticleRepository $articleRepository): Response
    {
            $article = $articleRepository->find($id);
            if (!$article) {
                return $this->redirectToRoute('app_acceuil');
            }
                return $this->render('show/index.html.twig',[
                    'article' => $article,
                ]);
                   
    }
}
