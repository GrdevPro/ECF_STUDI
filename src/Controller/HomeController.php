<?php

// src/Controller/HomeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository; // Importez le ServiceRepository

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // Votre logique de contrôleur ici
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/services", name="services")
     */
    public function services(ServiceRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findAll();

        return $this->render('home/index.html.twig', [
            'services' => $services,
        ]);
    }
}
