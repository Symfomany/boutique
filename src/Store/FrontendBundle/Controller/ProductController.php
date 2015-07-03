<?php

namespace Store\FrontendBundle\Controller;
use Store\FrontendBundle\Entity\Product;
use Store\FrontendBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductController
 * @package Store\FrontendBundle\Controller
 */
class ProductController extends Controller
{
    public function newAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $product = new Product();
        $form = $this->createForm(new ProductType(),$product,
            array(
                'attr' => array(
                    'method' => 'post',
                    'novalidate' => "novalidate",
//                    'action' => $this->generateUrl('store_frontend_product_new')
                    //action de formulaire pointe vers cette même action de controlleur
                )
            ));

        //form gere la requête
        $form->handleRequest($request);

        //si mon formulaire
        if($form->isValid()){

            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('store_frontend_homepage');
        }



       return $this->render('StoreFrontendBundle:Product:new.html.twig',
            ['form' => $form->createView()]
       );

    }

}
