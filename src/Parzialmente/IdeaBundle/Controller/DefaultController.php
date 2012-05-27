<?php

namespace Parzialmente\IdeaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ParzialmenteIdeaBundle:Default:index.html.twig', array('name' => $name));
    }
}
