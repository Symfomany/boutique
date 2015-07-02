<?php

namespace Store\FrontendBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class MainController
 * @package Store\FrontendBundle\Controller
 */
class StaticsController extends Controller
{

    public function conceptAction()
    {
        return $this->render('StoreFrontendBundle:Statics:concept.html.twig');
    }

    public function contactAction()
    {
        return $this->render('StoreFrontendBundle:Statics:contact.html.twig');
    }
    public function mentionAction()
    {
        return $this->render('StoreFrontendBundle:Statics:mention.html.twig');
    }
}
