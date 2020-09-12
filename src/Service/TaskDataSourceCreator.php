<?php

namespace App\Service;

use App\Dto\TaskDataSourceDto;
use App\Dto\TaskDto;
use Creator;
use Symfony\Component\HttpClient\CurlHttpClient;

class TaskDataSourceCreator extends Creator
{

    private TaskDataSourceDto $dataSource;



    public function __construct(TaskDataSourceDto $dataSource)
    {

        $this->dataSource = $dataSource;

        $this->create();
    }

    public function create()
    {

        $result = $this->fetchData($this->dataSource->getUrl());

        $this->createTaskItems($result);
    }

    public function createTaskItems(array $results)
    {

        $difficultyFieldName = $this->dataSource->getDifficultyFieldName();

        $timeFieldName = $this->dataSource->getTimeFieldName();

        $idFieldName = $this->dataSource->getIdFieldName();

        $nameFieldName = $this->dataSource->getNameFieldName();

        $pathName = $this->dataSource->getPathName();

        $pathIncrement = $this->dataSource->getPathIncrement();

        $count = 0;

        foreach ($results as $key => $value) {

            $objectRoot = $value;

            if (!empty($pathName)) {

                $path = $pathName;

                if ($pathIncrement) {

                    $path = $pathName . "" . $count;
                }

                $objectRoot = $value->$path;
            }

            $taskItem = new TaskDto();

            $taskItem->setDifficulty($objectRoot->$difficultyFieldName);

            $taskItem->setTime($objectRoot->$timeFieldName);

            if (!empty($idFieldName)) {

                $taskItem->setId($objectRoot->$idFieldName);
            }

            if (!empty($nameFieldName)) {

                $taskItem->setName($objectRoot->$nameFieldName);
            }

            $taskItem->setManDay($taskItem->getTime() * $taskItem->getDifficulty());

            $this->addToDataList($taskItem);

            $count++;
        }
    }

    public function fetchData(string $url)
    {

        $client = new CurlHttpClient();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);


        $content = $response->getContent();

        return json_decode($content);
    }



    /**
     * Get the value of dataSource
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * Set the value of dataSource
     *
     * @return  self
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;

        return $this;
    }
}
