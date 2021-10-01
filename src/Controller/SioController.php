<?php

// src/Controller/SioController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SioController extends AbstractController
{

    /**
     * @Route("/sio/hello", methods={"GET"}, name="Hello_World")
     */

    public function indexAction(Request $request): Response
    {
        $hello = "Man";
        $languages = $request->getLanguages();
        $id = $request->getClientIp();
        return $this->render('sio/Hello.html.twig', [
            'Hello' => $hello,
            'languages' => $languages,
            'ip' => $id,
        ]);

    }

    /**
     * @Route("/Hello/{nom}", methods={"GET"}, name="sio_hello")
     */
    public function helloAction($nom = 'Hello Inconnu', Request $request)
    {
        $ip = $request->getClientIp();
        $this->addFlash('succes', "Bienvenu :" . $ip);

        $noms = explode("_", $nom);
        if (count($noms) == 1) {
            $noms[1] = null;
        }

        return $this->render('sio/Name.html.twig', [
            'nom' => $noms,
            'ip' => $ip,
        ]);
    }
}
