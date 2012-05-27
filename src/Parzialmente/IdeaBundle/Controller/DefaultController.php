<?php

namespace Parzialmente\IdeaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function nuovaAction()
    {
        return $this->render('ParzialmenteIdeaBundle:Default:nuova.html.twig', array());
    }

    public function mostraAction($id, $slug)
    {
	$idea = array("id" => $id, "description" => "TODO carica da DB l'idea");
        return $this->render('ParzialmenteIdeaBundle:Default:idea.html.twig', array("idea" => $idea));
    }
}
