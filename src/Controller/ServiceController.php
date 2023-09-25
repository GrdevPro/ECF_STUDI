<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

    #[Route('/reparation', name: 'app_reparation')]
    public function reparation(): Response
    {
        // Code pour charger les données du service "Réparation" depuis la base de données
        $service = 'Réparation'; // Exemple de données

        return $this->render('service/reparation.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/vente', name: 'app_vente')]
    public function vente(): Response
    {
        // Code pour charger les données du service "Vente" depuis la base de données
        $service = 'Vente'; // Exemple de données

        return $this->render('service/vente.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/entretien', name: 'app_entretien')]
    public function entretien(): Response
    {
        // Code pour charger les données du service "Entretien" depuis la base de données
        $service = 'Entretien'; // Exemple de données

        return $this->render('service/entretien.html.twig', [
            'service' => $service,
        ]);
    }
}