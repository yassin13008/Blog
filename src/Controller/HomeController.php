<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
   #[Route('/', name: 'home.index')]
   public function index(PostRepository $postRepository): Response
   {

    $posts = $postRepository->findAll();

    

   // dd($posts);
   
return $this->render('home/index.html.twig', [
    'posts' => $posts
]);


   }
}

