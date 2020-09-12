<?php

// src/Controller/DataController.php

namespace App\Controller;

use App\Controller\BaseController;
use App\Service\DataInitializationService;
use App\Service\DataSourceService;
use App\Service\DeveloperService;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class DataController extends BaseController
{

    /**
     * @Route("/rest/data/init", name="init_data")
     */
    public function initData(SerializerInterface $serializer, SessionInterface $session)
    {


        $service = new DataInitializationService($session);
        $service->initDataSources();
        $service->initDevelopers();

        return $this->sendJsonResponse(["result" => "ok"], $serializer);
    }

    /**
     * @Route("/rest/data/developers", name="list_developers")
     */
    public function getDevelopers(SerializerInterface $serializer, SessionInterface $session)
    {


        $service = new DeveloperService($session);

        return $this->sendJsonResponse($service->getDevelopers(), $serializer);
    }

    /**
     * @Route("/rest/data/datasources", name="list_datasources")
     */
    public function getDataSources(SerializerInterface $serializer, SessionInterface $session)
    {

        $service = new DataSourceService($session);
        
        return $this->sendJsonResponse($service->getDataSources(), $serializer);
    }

    
}
