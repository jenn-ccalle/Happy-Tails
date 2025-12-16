<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contratacion")
 */

class ContratacionController extends AbstractController
{
    /**
     * @Route("/nuevo", name="app_contratacion", methods={"POST"})
     */
    public function crearContratacion(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ContratacionController.php',
        ]);
    }
}
