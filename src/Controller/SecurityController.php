<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\LoginFormAdminType;

class SecurityController extends AbstractController
{
    #[Route('/security', name: 'app_security')]
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // Récupérer les erreurs de connexion s'il y en a
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupérer le dernier e-mail entré par l'utilisateur
        $lastEmail = $authenticationUtils->getLastUsername();

        // Créez un formulaire de connexion en utilisant le type de formulaire que vous avez généré (LoginFormAdminType)
        $form = $this->createForm(LoginFormAdminType::class, [
            'email' => $lastEmail,
        ]);

        // Gérez la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Le formulaire a été soumis et les données sont valides

            // Vous pouvez gérer l'authentification ici, par exemple, en utilisant le composant Symfony Security

            return $this->redirectToRoute('votre_page_de_succès');
        }

        return $this->render('security/login.html.twig', [
            'form' => $form->createView(),
            'error' => $error,
        ]);
    }
}