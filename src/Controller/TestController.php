<?php

// src/Controller/TestController.php

namespace App\Controller;

use App\Dto\TestDto;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TestController extends BaseController
{

    /**
     * @Route("/test/{data}", name="test_data")
     */
    public function test($data, SerializerInterface $serializer)
    {

        $testDto = new TestDto();

        $testDto->setAge($data);
        $testDto->setName("fatih");



        return $this->sendJsonResponse($testDto, $serializer);
    }
}
