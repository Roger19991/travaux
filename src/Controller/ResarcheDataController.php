<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ResarcheDataType;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Resarchedata;
use DateTime;
use DateTimeImmutable;

class ResarcheDataController extends AbstractController
{
    /**
     * @Route("/ResarcheData", name="ResarcheData_form")
     */
    public function resarcheDataForm(Request $request): Response
    {
        $form = $this->createForm(ResarcheDataType::class); 
        $resarchedata = new Resarchedata();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $resarchedata = $form->getData();
            $startPeriodeString = $form->get('startPeriode')->getData(); // Récupère la valeur du champ startPeriode du formulaire
            $startPeriode = new DateTimeImmutable($startPeriodeString); // Convertit la chaîne en objet DateTime

            $resarchedata->setStartPeriode($startPeriode); // Affecte la valeur à la propriété startPeriode de votre entité

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resarchedata);
            $entityManager->flush();
            
            return $this->redirectToRoute('/Regression'); 
        }

        return $this->render('ResarcheData.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}