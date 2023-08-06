<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Axles;
use App\Form\AxleType;

class AxleController extends AbstractController
{
    public function createAxle(Request $request): Response
    {
        $axle = new Axles();
        $form = $this->createForm(AxleType::class, $axle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($axle);
            $entityManager->flush();

            return $this->redirectToRoute('axles_index');
        }

        return $this->render('axles/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function showAxles(): Response
    {
        $axles = $this->getDoctrine()->getRepository(Axles::class)->findAll();

        return $this->render('axles/index.html.twig', [
            'axles' => $axles,
        ]);
    }

    public function showAxle(int $id): Response
    {
        $axle = $this->getDoctrine()->getRepository(Axles::class)->find($id);

        return $this->render('axles/show.html.twig', [
            'axle' => $axle,
        ]);
    }

    public function deleteAxle(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $axle = $entityManager->getRepository(Axles::class)->find($id);

        if (!$axle) {
            throw $this->createNotFoundException('Axle not found');
        }

        $entityManager->remove($axle);
        $entityManager->flush();

        return $this->redirectToRoute('axles_index');
    }
}