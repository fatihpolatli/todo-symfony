<?php

// src/Controller/BaseController.php

namespace  App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

abstract class BaseController extends AbstractController
{

    protected function sendJsonResponse($data, SerializerInterface $serializer): Response
    {

        $json = $serializer->serialize(
            $data,
            'json'
        );

        $response = new Response($json);

        $response->headers->set('Content-Type', 'application/json');


        return $response;
    }
}
