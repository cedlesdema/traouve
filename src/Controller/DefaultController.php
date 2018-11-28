<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\County;
use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageFound()
    {
        $traobjects_found = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByStatut(State::FOUND);
        $traobjects_lost = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByStatut(State::LOST);

        return $this->render('default/homepage.html.twig', [
            'traobjects_found' => $traobjects_found,
            'traobjects_lost' => $traobjects_lost
        ]);
    }
}
