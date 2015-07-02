<?php

namespace Store\FrontendBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class MainController
 * @package Store\FrontendBundle\Controller
 */
class MainController extends Controller
{
    /**
     * julien@meetserious.com
     * Page d'accueil
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homepageAction()
    {
        //Je recupere le Manager d'Entités de Doctrine
        $em = $this->getDoctrine()->getManager();

        //Je récupère 1 seul produit âr son ID de ma table product
        $product = $em->getRepository('StoreFrontendBundle:Product')
            ->find(1);
        //Je récupère 1 seul produit âr son ID de ma table product
        $category = $em->getRepository('StoreFrontendBundle:Category')
            ->find(1);


        //Je récupère tous les produits visibles
        $products = $em->getRepository('StoreFrontendBundle:Product')
            ->getProductHomepage();

        $categories = $em->getRepository('StoreFrontendBundle:Category')
            ->findAll();


        return $this->render('StoreFrontendBundle:Main:homepage.html.twig',
            [
                "categories" => $categories,
                "product" => $product,
                "products" => $products,
                "title" => "Boutique en ligne de bijoux",
                "description" => "Boutique de Bijoux",
                "keywords" => "boutique,bijoux,createurs",
                "today" => new \DateTime('now'),
                "tags" => ["Bijoux-Fantaisies", "Bijoux-Créateurs", "Bijoux-Fait-Main"]
            ]
        );
    }
}
