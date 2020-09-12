<?php
namespace App\Dto;

use App\Dto\BaseDto;

class TaskDataSourceDto extends BaseDto{

    private $url;

    private $pathName;

    private $difficultyFieldName;

    private $timeFieldName;

    private $idFieldName;

    private $nameFieldName;

    private bool $pathIncrement = false;


    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of difficultyFieldName
     */ 
    public function getDifficultyFieldName()
    {
        return $this->difficultyFieldName;
    }

    /**
     * Set the value of difficultyFieldName
     *
     * @return  self
     */ 
    public function setDifficultyFieldName($difficultyFieldName)
    {
        $this->difficultyFieldName = $difficultyFieldName;

        return $this;
    }

    /**
     * Get the value of timeFieldName
     */ 
    public function getTimeFieldName()
    {
        return $this->timeFieldName;
    }

    /**
     * Set the value of timeFieldName
     *
     * @return  self
     */ 
    public function setTimeFieldName($timeFieldName)
    {
        $this->timeFieldName = $timeFieldName;

        return $this;
    }

    /**
     * Get the value of idFieldName
     */ 
    public function getIdFieldName()
    {
        return $this->idFieldName;
    }

    /**
     * Set the value of idFieldName
     *
     * @return  self
     */ 
    public function setIdFieldName($idFieldName)
    {
        $this->idFieldName = $idFieldName;

        return $this;
    }

    /**
     * Get the value of nameFieldName
     */ 
    public function getNameFieldName()
    {
        return $this->nameFieldName;
    }

    /**
     * Set the value of nameFieldName
     *
     * @return  self
     */ 
    public function setNameFieldName($nameFieldName)
    {
        $this->nameFieldName = $nameFieldName;

        return $this;
    }

    /**
     * Get the value of pathName
     */ 
    public function getPathName()
    {
        return $this->pathName;
    }

    /**
     * Set the value of pathName
     *
     * @return  self
     */ 
    public function setPathName($pathName)
    {
        $this->pathName = $pathName;

        return $this;
    }

    /**
     * Get the value of pathIncrement
     */ 
    public function getPathIncrement()
    {
        return $this->pathIncrement;
    }

    /**
     * Set the value of pathIncrement
     *
     * @return  self
     */ 
    public function setPathIncrement($pathIncrement)
    {
        $this->pathIncrement = $pathIncrement;

        return $this;
    }
}