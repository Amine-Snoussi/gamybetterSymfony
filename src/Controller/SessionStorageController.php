<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class SessionStorageController extends AbstractController
{
    /**
     * @Route("/sessionstorage", name="app_session_storage")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        if ($session->has('nbvisite')) {
            $nbreVisites = $session->get('nbvisite') + 1;
        } else {
            $nbreVisites = 1;
        }
        $session->set('nbvisite', $nbreVisites);
        return $this->render('session_storage/index.html.twig');
    }
}
