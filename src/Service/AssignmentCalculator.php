<?php

use App\Service\AssignmentService;
use App\Service\BaseService;
use App\Service\DataSourceService;
use App\Service\DeveloperService;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AssignmentCalculator extends BaseService
{


    private array $assignments;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }


    public function calculate()
    {



        $developerService = new DeveloperService($this->session);

        $developers =  $developerService->getDevelopers();


        $dataSourceService = new DataSourceService($this->session);


        $dataSourceService->resetAllTasks();


        $assignmentService = new AssignmentService($this->session);
        $assignmentService->resetAssignments();

        $averageManDay = $assignmentService->getAverageManDayForAllTasks();

        foreach ($developers as $key => $developer) {

            $assignmentService->assignForDeveloper($developer, $averageManDay);
        }
    }





    /**
     * Get the value of taskDataSource
     */
    public function getTaskDataSource()
    {
        return $this->taskDataSource;
    }

    /**
     * Set the value of taskDataSource
     *
     * @return  self
     */
    public function setTaskDataSource($taskDataSource)
    {
        $this->taskDataSource = $taskDataSource;

        return $this;
    }

    /**
     * Get the value of assignments
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * Set the value of assignments
     *
     * @return  self
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;

        return $this;
    }
}
