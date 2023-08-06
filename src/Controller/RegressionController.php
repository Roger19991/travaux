<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegressionController extends AbstractController{
    /**
     * @Route("/regression", name="regression")
     */
    public function regression(): Response
    {
        // Données d'exemple pour les catégories de véhicules automobiles (y) et les années (x)
        $categories = array("C1", "C2", "C3", "C4", "C5", "C6", "C7");
        $annees = array(2010, 2011, 2012, 2013, 2014, 2015, 2016);
        $valeurs_y = array(10, 12, 15, 18, 20, 22, 25);

        // Calcul des moyennes des catégories de véhicules automobiles (ȳ) et des années (x̄)
        $moyenne_y = array_sum($valeurs_y) / count($valeurs_y);
        $moyenne_x = array_sum($annees) / count($annees);

        // Calcul des écarts par rapport aux moyennes pour chaque catégorie de véhicule (y - ȳ) et année (x - x̄)
        $ecarts_y = array();
        $ecarts_x = array();
        for ($i = 0; $i < count($valeurs_y); $i++) {
            $ecarts_y[$i] = $valeurs_y[$i] - $moyenne_y;
            $ecarts_x[$i] = $annees[$i] - $moyenne_x;
        }

        // Calcul du produit des écarts pour chaque catégorie de véhicule multiplié par l'écart correspondant pour l'année
        $produits_ecarts = array();
        for ($i = 0; $i < count($valeurs_y); $i++) {
            $produits_ecarts[$i] = $ecarts_y[$i] * $ecarts_x[$i];
        }

        // Calcul de la somme des carrés des écarts pour chaque année
        $somme_carres_ecarts = 0;
        for ($i = 0; $i < count($valeurs_y); $i++) {
            $somme_carres_ecarts += pow($ecarts_x[$i], 2);
        }

        // Calcul de la pente de la droite de régression (b)
        $pente = array_sum($produits_ecarts) / $somme_carres_ecarts;

        // Calcul de l'ordonnée à l'origine de la droite de régression (a)
        $ordonnee_origine = $moyenne_y - $pente * $moyenne_x;

        // Affichage de la droite de régression y en fonction de x
        $equation = "La droite de régression y en fonction de x est donnée par l'équation : y = " . $ordonnee_origine . " + " . $pente . " * x";

        return $this->render('regression/index.html.twig', [
            'equation' => $equation,
        ]);
    }
}