<?php

namespace App\Controller;

use App\Entity\Employees;
use App\Form\AddEmployeeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminEmployeeController extends AbstractController
{
    #[Route('/admin/employees/add', name: 'admin_add_employee')]
    public function addEmployee(Request $request): Response
    {
        $employee = new Employees(); // Créez une nouvelle instance de l'entité Employees

        // Créez le formulaire en utilisant le formulaire que vous avez généré (AddEmployeeFormType)
        $form = $this->createForm(AddEmployeeFormType::class, $employee);

        // Gérez la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Le formulaire a été soumis et les données sont valides
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employee);
            $entityManager->flush();

            // Redirigez l'utilisateur vers une page de succès ou une autre page appropriée
            return $this->redirectToRoute('admin_dashboard');
        }

        return $this->render('admin_employee/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}