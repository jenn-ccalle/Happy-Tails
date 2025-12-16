<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/cuidador")
*/

class CuidadorController extends AbstractController
{
    /**
     * @Route("/cuidador", name="app_cuidador", methods={"POST"})
     */
    public function crearCuidador(Request $request, EntityManagerInterface $em): void
    {
        $request = $this->transformJsonBody($request);
        dump($request);
    }

    protected function transformJsonBody(Request $request){
        $data = json_decode($request->getContent(), true);
        if(json_last_error() !== JSON_ERROR_NONE){
            return null;
        }
        if($data === null){
            return $request;
        }
        $request->request->replace($data);
        return $request;
    }
}
