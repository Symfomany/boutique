<?php

namespace Store\FrontendBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class ProductController
 * @package Store\FrontendBundle\Controller
 */
class ProductController extends Controller
{
    public function newAction(){
       return $this->render('StoreFrontendBundle:Product:new.html.twig');    }

}
