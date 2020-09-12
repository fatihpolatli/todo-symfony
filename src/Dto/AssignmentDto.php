<?php

namespace App\Dto;

use App\Dto\BaseDto;

class AssignmentDto extends BaseDto
{

    private array $tasks = array();

    private DeveloperDto $developer;

    private int $estimatedTime = 0;

    private int $totalManDay = 0;

    public function addToTaskList(TaskDto $task){

        array_push($this->tasks, $task);

        $this->calculateManDay();
    }

    private function calculateManDay(){

        $manDay = 0;

        foreach($this->tasks as $key=>$task){

            $manDay = $manDay + $task->getManDay();
        }

        $this->setTotalManDay($manDay);
    }

    /**
     * Get the value of developer
     */
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Set the value of developer
     *
     * @return  self
     */
    public function setDeveloper($developer)
    {
        $this->developer = $developer;

        return $this;
    }



    /**
     * Get the value of estimatedTime
     */
    public function getEstimatedTime()
    {
        return $this->estimatedTime;
    }

    /**
     * Set the value of estimatedTime
     *
     * @return  self
     */
    public function setEstimatedTime($estimatedTime)
    {
        $this->estimatedTime = $estimatedTime;

        return $this;
    }

    /**
     * Get the value of tasks
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set the value of tasks
     *
     * @return  self
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get the value of totalManDay
     */ 
    public function getTotalManDay()
    {
        return $this->totalManDay;
    }

    /**
     * Set the value of totalManDay
     *
     * @return  self
     */ 
    private function setTotalManDay($totalManDay)
    {
        $this->totalManDay = $totalManDay;

        return $this;
    }
}
