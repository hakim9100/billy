<?php

// src/Controller/SioController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SioController extends AbstractController {

    /**
     * @Route("/lucky/hello", methods={"GET"}, name="Hello_World")
     */

    public function indexAction(Request $request): Response{
        $hello = "Man";
    $languages = $request -> getLanguages();
    $id = $request -> getClientIp();
        return $this->render('lucky/Hello.html.twig', [
            'Hello' => $hello,
            'languages' => $languages,
            'ip' => $id,
        ]);
    }
}
