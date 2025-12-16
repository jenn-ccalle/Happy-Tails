<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Entity\Persona;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/clientes")
 */
class ClientesController extends AbstractController
{
    /**
    * @Route("/nuevo", name="app_clientes", methods={"POST"})
    */
    public function crearCliente(Request $request, EntityManagerInterface $em): JsonResponse
    {
        try {
            $request = $this->transformJsonBody($request);
            
            // Validar que los datos existan
            if (!$request->get('nombre') || !$request->get('apellidos') || !$request->get('email')) {
                return $this->json([
                    'error' => 'Faltan campos requeridos'
                ], Response::HTTP_BAD_REQUEST);
            }
            
            $persona = new Persona();

            $persona->setNombre($request->get('nombre'));
            $persona->setApellidos($request->get('apellidos'));
            $persona->setDni($request->get('dni'));
            $persona->setDireccion($request->get('direccion'));
            $persona->setTelefono($request->get('telefono'));
            $persona->setEmail($request->get('email'));
            
            // Convertimos la fecha a DateTime
            $fechaNacString = $request->get('fechaNac');
            if ($fechaNacString) {
                try {
                    $fechaNac = new \DateTime($fechaNacString);
                    $persona->setFechaNac($fechaNac);
                } catch (\Exception $e) {
                    return $this->json([
                        'error' => 'Formato de fecha inválido. Use YYYY-MM-DD'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            
            // Hash de la contraseña
            $contrasena = $request->get('contrasena');
            if ($contrasena) {
                $persona->setContrasena(password_hash($contrasena, PASSWORD_BCRYPT));
            }

            // Creamos el cliente también
            $cliente = new Cliente();
            $cliente->setPersona($persona);

            $em->persist($persona);
            $em->persist($cliente);
            $em->flush();

            return $this->json([
                'success' => true,
                'message' => 'Cliente creado correctamente',
                'data' => [
                    'id' => $cliente->getId(),
                    'nombre' => $persona->getNombre(),
                    'apellidos' => $persona->getApellidos(),
                    'email' => $persona->getEmail()
                ]
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Error al crear el cliente',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @Route("/login", name="cliente_login", methods={"POST"})
     */
    public function login(Request $request, EntityManagerInterface $em): JsonResponse
    {
        try {
            $request = $this->transformJsonBody($request);
            
            $email = $request->get('email');
            $contrasena = $request->get('contrasena');

            // Validar que los datos existan
            if (!$email || !$contrasena) {
                return $this->json([
                    'success' => false,
                    'error' => 'Email y contraseña son requeridos'
                ], Response::HTTP_BAD_REQUEST);
            }

            // Buscar persona por email usando DQL
            $query = $em->createQuery(
                'SELECT p FROM App\Entity\Persona p WHERE p.Email = :email'
            )->setParameter('email', $email);

            try {
                $persona = $query->getSingleResult();
            } catch (\Doctrine\ORM\NoResultException $e) {
                return $this->json([
                    'success' => false,
                    'error' => 'Credenciales incorrectas'
                ], Response::HTTP_UNAUTHORIZED);
            }

            // Verificar la contraseña
            if (!password_verify($contrasena, $persona->getContrasena())) {
                return $this->json([
                    'success' => false,
                    'error' => 'Credenciales incorrectas'
                ], Response::HTTP_UNAUTHORIZED);
            }

            // Login exitoso - devolver datos de la persona
            // Usamos el ID de la persona directamente
            return $this->json([
                'success' => true,
                'message' => 'Login exitoso',
                'data' => [
                    'id' => $persona->getId(),
                    'nombre' => $persona->getNombre(),
                    'apellidos' => $persona->getApellidos(),
                    'email' => $persona->getEmail(),
                    'dni' => $persona->getDni(),
                    'telefono' => $persona->getTelefono(),
                    'direccion' => $persona->getDireccion(),
                    'fechaNac' => $persona->getFechaNac() ? $persona->getFechaNac()->format('Y-m-d') : null
                ]
            ], Response::HTTP_OK);

        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => 'Error al iniciar sesión',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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


