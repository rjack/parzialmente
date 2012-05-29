<?php

namespace Parzialmente\IdeaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Parzialmente\IdeaBundle\Entity\Idea;


class DefaultController extends Controller
{

    public function nuovaAction()
    {
        $idea = new Idea();
        $idea->setTitle("Dai un titolo");
        $idea->setDescription("Descrivi la tua idea.");

        $form = $this->createFormBuilder($idea)
            ->add("title", "text")
            ->add("description", "textarea")
            ->getForm();

        return $this->render('ParzialmenteIdeaBundle:Default:nuova.html.twig', array(
            "form" => $form->createView()
        ));
    }

    public function mostraAction($id, $slug)
    {
        $idea = array("id" => $id, "description" => "TODO carica da DB l'idea");
        return $this->render('ParzialmenteIdeaBundle:Default:idea.html.twig', array("idea" => $idea));
    }


    public function ideeAction(Request $request)
    {
    }
}
