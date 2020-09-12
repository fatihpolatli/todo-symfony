<?php

namespace App\Service;

use App\Dto\DeveloperDto;
use AssignmentCalculator;
use App\Dto\AssignmentDto;
use App\Service\BaseService;
use App\Service\Interfaces\IAssignmentService as InterfacesIAssignmentService;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AssignmentService extends BaseService implements InterfacesIAssignmentService
{
    public static string $ASSIGNMENT_KEY = "assignments";

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function getAssignments()
    {

        $assignments = $this->session->get($this::$ASSIGNMENT_KEY);

        if (!isset($assignments)) {

            $assignments = array();

            $this->session->set($this::$ASSIGNMENT_KEY, $assignments);
        }

        return $assignments;
    }

    public function addToAssignments(AssignmentDto $assignment)
    {


        $assignments = $this->session->get($this::$ASSIGNMENT_KEY);

        if (!isset($assignments)) {

            $assignment = array();
        }

        array_push($assignments, $assignment);

        $this->session->set($this::$ASSIGNMENT_KEY, $assignments);
    }

    public function getAssignmentByDeveloper(DeveloperDto $developer): AssignmentDto
    {

        $assignments = $this->getAssignments();

        foreach ($assignments as $key => $assignment) {

            if ($assignment->getDeveloper() == $developer) {

                return $assignment;
            }
        }

        $a = new AssignmentDto();

        $a->setDeveloper($developer);

        $this->addToAssignments($a);

        return $a;
    }

    public function getAverageManDayForAllTasks(): int
    {



        $dataSourceService = new DataSourceService($this->session);

        $dataSources = $dataSourceService->getDataSources();

        $totalManDay = 0;

        foreach ($dataSources as $skey => $dataSource) {

            foreach ($dataSource->getDataList() as $tkey => $task) {

                $totalManDay = $totalManDay + $task->getManDay();
            }
        }

        $developerService = new DeveloperService($this->session);

        $developers =  $developerService->getDevelopers();

        $totalDevManDay = 0;

        foreach ($developers as $key => $developer) {

            $totalDevManDay = $totalDevManDay + $developer->getManDay();
        }


        return ceil($totalManDay / $totalDevManDay);
    }

    public function assignForDeveloper(DeveloperDto $developer, int $averageManDay)
    {

        $assignment = $this->getAssignmentByDeveloper($developer);

        $dataSourceService = new DataSourceService($this->session);

        $dataSources = $dataSourceService->getDataSources();

        $manDayLimit =  $averageManDay * $developer->getDifficulty();

        foreach ($dataSources as $skey => $dataSource) {

            foreach ($dataSource->getDataList() as $tkey => $task) {

                if ($task->getAssigned() == false && $assignment->getTotalManDay() + $task->getManDay() <= $manDayLimit) {

                    $assignment->addToTaskList($task);
                    $task->setAssigned(true);
                }
            }
        }
    }

    public function calculateAssignments()
    {

        $assignmentCalculator = new AssignmentCalculator($this->session);

        $assignmentCalculator->calculate();
    }

    public function resetAssignments()
    {

        $this->session->set($this::$ASSIGNMENT_KEY, []);
    }

    public function getEstimatedTime()
    {

        $assignments = $this->getAssignments();

        $totalManDay = 0;

        foreach ($assignments as $key => $assignment) {

            $totalManDay = $totalManDay + $assignment->getTotalManday();
        }

        $hourStr = ceil($totalManDay / 24);

        $dayStr = ceil($hourStr / 8);

        $weekStr = ceil($hourStr / 45);



        return $hourStr . " hour(s) or " . $dayStr . " day(s) or " . $weekStr . " week(s)";
    }
}
