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

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction($id){

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('StoreFrontendBundle:Product')->find($id);

        $em->remove($product);
        $em->flush();

        //créer un message flash
        $this->get('session')->getFlashBag()->add(
            'notice',
            'Votre produit a bien été supprimé'
        );

        return $this->redirectToRoute('store_frontend_homepage');
    }



    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        //retrouver le produit selon son id
        $product = $em->getRepository('StoreFrontendBundle:Product')->find($id);

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

            //créer un message flash
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Votre produit a bien été edité'
            );

            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('store_frontend_homepage');
        }

      return $this->render("StoreFrontendBundle:Product:edit.html.twig",
          [
              'form' => $form->createView(),
              'product' => $product
          ]

          );
    }


    public function newAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $product = new Product();
//        $product = $em->getRepository('StoreBackendBundle:Product')->find(3);

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

            //créer un message flash
            $this->get('session')->getFlashBag()->add(
                'notice',
                'Votre produit a bien été crée'
            );
            return $this->redirectToRoute('store_frontend_homepage');
        }



       return $this->render('StoreFrontendBundle:Product:new.html.twig',
            ['form' => $form->createView()]
       );

    }

}
