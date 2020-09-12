<?php

use App\Dto\BaseDto;

abstract class Creator
{
    private array $dataList = array();

    abstract protected  function create();

    public function addToDataList(BaseDto $item){

        array_push($this->dataList, $item);
    }


    /**
     * Get the value of dataList
     */ 
    public function getDataList()
    {
        return $this->dataList;
    }

    /**
     * Set the value of dataList
     *
     * @return  self
     */ 
    public function setDataList($dataList)
    {
        $this->dataList = $dataList;

        return $this;
    }
}
