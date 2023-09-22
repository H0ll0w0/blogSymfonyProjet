<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        // dd($articles);

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('blog/home.html.twig', [
            'title' => "Bienvenue les zamis",
            'age' => 31
        ]);
    }

    #[Route('/blog/{id}', name:'blog_show')]
    public function show($id, ArticleRepository $articleRepository){
        $articles = $articleRepository->find($id);
        return $this->render('blog/show.html.twig', [
            'article' => $articles
        ]);
    }
}
