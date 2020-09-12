<?php

namespace App\Dto;

use App\Dto\BaseDto;

class TaskDto extends BaseDto
{

    private  $id;

    private $name;

    private  $time;

    private  $difficulty;

    private  $manDay = 0;

    private  $assigned = false;

    public function __construct()
    {
        $this->id = uniqid("task_");
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the value of difficulty
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     *
     * @return  self
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get the value of assigned
     */
    public function getAssigned()
    {
        return $this->assigned;
    }

    /**
     * Set the value of assigned
     *
     * @return  self
     */
    public function setAssigned($assigned)
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * Get the value of manDay
     */
    public function getManDay()
    {
        return $this->manDay;
    }

    /**
     * Set the value of manDay
     *
     * @return  self
     */
    public function setManDay($manDay)
    {
        $this->manDay = $manDay;

        return $this;
    }
}
