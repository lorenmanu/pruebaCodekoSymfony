<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/RandDomSentece")
     */
    public function RandDomSenteceAction()
    {

      return $this->render(
          'default/index.html.twig'
             );

    }

    /**
     * @Route("/findRandDomSentece")
     */
    public function findRandDomSenteceAction()
    {

      $obj = json_decode(file_get_contents('https://api.chucknorris.io/jokes/random'), true);
      return new Response($obj['value']);

    }

}
