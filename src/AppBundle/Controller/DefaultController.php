<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
    /**
     * @Route("/test/{name}/{lastname}/{age}")
     */
    public function testAction(Request $requet){
        $name=$requet->get('name');
        $lastname=$requet->get('lastname');
        $age=$requet->get('age');
        $session=$requet->getSession();
        $session->set("username","$name $lastname $age");
        return $this->redirectToRoute("hi");
    }
     /**
     * @Route("/hi",name="hi")
     */
    public function hiAction(Request $requet){
        $session=$requet->getSession();
        return $this->render('default/test.html.twig', array('name'=>$session->get("username")));
          
    }
}
