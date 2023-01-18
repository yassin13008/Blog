<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    public function __construct(
        private FormFactoryInterface $formFactory
       ){}
    // #[Route(path: '/login', name: 'security.login')]
    // public function login(AuthenticationUtils $authenticationUtils): Response
    // {
    //     // if ($this->getUser()) {
    //     //     return $this->redirectToRoute('target_path');
    //     // }

    //     // get the login error if there is one
    //     $error = $authenticationUtils->getLastAuthenticationError();
    //     // last username entered by the user
    //     $lastUsername = $authenticationUtils->getLastUsername();

    //     return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    // }

    #[Route(path: '/login', name: 'security.login')] // Bonus du chap 8 ici
public function login(AuthenticationUtils $utils): Response
{

    $form = $this->formFactory->createNamed('', LoginType::class);

   $lastEmail = $utils->getLastUsername();
   $form = $this->formFactory->createNamed('', LoginType::class, ['email' => $lastEmail]);
   $error = $utils->getLastAuthenticationError();

   return $this->render('security/login.html.twig', [
       'loginForm' => $form->createView(),
       'error' => $error
   ]);
}


    #[Route(path: '/logout', name: 'security.logout')]
    public function logout(): void
    {
        
    }
}
