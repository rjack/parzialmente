<?php

namespace Parzialmente\IdeaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Parzialmente\IdeaBundle\Entity\Idea;
use Parzialmente\IdeaBundle\Form\Type\IdeaType;


class DefaultController extends Controller
{

    public function nuovaAction (Request $req)
    {
        $idea = new Idea();
        $idea->setTitle("Dai un titolo");
        $idea->setDescription("Descrivi la tua idea.");

        $form = $this->createForm(new IdeaType(), $idea);

        if ($req->getMethod() === "POST") {
            $form->bindRequest($req);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($idea);
                $em->flush();
                return $this->redirect($this->generateUrl("ParzialmenteIdeaBundle_idea", array(
                    "id" => $idea->getId(),
                    "slug" => "TODO"
                )));
            }
        }


        return $this->render('ParzialmenteIdeaBundle:Default:nuova.html.twig', array(
            "form" => $form->createView()
        ));
    }


    public function mostraAction ($id, $slug)
    {
        $idea = $this->getDoctrine()
            ->getRepository("ParzialmenteIdeaBundle:Idea")
            ->find($id);

        if (!$idea) {
            throw $this->createNotFoundException('Nessuna idea con id '.$id);
        }

        return $this->render('ParzialmenteIdeaBundle:Default:idea.html.twig', array("idea" => $idea));
    }
}
