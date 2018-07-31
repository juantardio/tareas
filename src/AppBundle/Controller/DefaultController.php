<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Route("/tareas", name="tareas")
     */
    public function tareasAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Tarea');

        $tareas = $repository->findAll();

        return $this->render('default/pantalla_tareas.html.twig',
        array(
            'tareas'=>$tareas, 
            'mensaje'=>"Hola"));

    }

    /**
     * @Route("/tarea/{id}", name="tarea", requirements={"id"="\d+"})
     */
    public function tareaAction($id)
    {
       $repository = $this->getDoctrine()->getRepository('AppBundle:Tarea');

       $tarea = $repository->findOneById($id);

       return $this->render('default/tarea_unica.html.twig', array('tarea'=>$tarea));
    }
}

