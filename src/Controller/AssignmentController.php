<?php

namespace App\Controller;

use App\Controller\BaseController;
use App\Service\AssignmentService;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class AssignmentController extends BaseController
{

    /**
     * @Route("/rest/assignments/calculate", name="calculate_assignments")
     */
    public function calculateAssignments(SerializerInterface $serializer, SessionInterface $session)
    {


        $service = new AssignmentService($session);
        $service->calculateAssignments();


        return $this->sendJsonResponse(["result" => "ok"], $serializer);
    }

    /**
     * @Route("/rest/assignments", name="list_assignments")
     */
    public function getAssignments(SerializerInterface $serializer, SessionInterface $session)
    {
       
        $service = new AssignmentService($session);
        $result = $service->getAssignments();


        return $this->sendJsonResponse($result, $serializer);
    }

    /**
     * @Route("/rest/assignments/estimated-time", name="estimated_time")
     */
    public function getEstimatedTime(SerializerInterface $serializer, SessionInterface $session)
    {

        $service = new AssignmentService($session);
        $result = $service->getEstimatedTime();


        return $this->sendJsonResponse(["result" => $result], $serializer);
    }
}
