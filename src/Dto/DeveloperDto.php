<?php

namespace App\Dto;

use App\Dto\BaseDto;

class DeveloperDto extends BaseDto
{

    private $id;

    private int $time;

    private int $difficulty;

    public function __construct()
    {
        $this->id = uniqid("dev_");
    }


    private int $manDay = 0;
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
}
