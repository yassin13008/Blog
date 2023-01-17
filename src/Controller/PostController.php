<?php

namespace App\Controller;


use App\Entity\Post;
use App\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route("/post/{slug}", name:"post.index")]
public function index(Post $post,Request $request): Response
{
    $form = $this->createForm(CommentType::class);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        dd($form->getData());
   }

    return $this->render('post/index.html.twig', [
        'post' => $post,
        'form' => $form->createView()
    ]);
    
}

}
