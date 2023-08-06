<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ResarcheDataType;

class ResarcheDataController extends AbstractController
{
    /**
     * @Route("/resarchedata", name="resarchedata_form")
     */
    public function resarcheDataForm(Request $request): Response
    {
        $form = $this->createForm(ResarcheDataType::class); 

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $resarcheData = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resarcheData);
            $entityManager->flush();
        }

        return $this->render('resarchedata.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}