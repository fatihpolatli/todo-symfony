<?php

namespace App\Service;

use App\Service\BaseService;
use App\Service\Interfaces\IDataSourceService;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DataSourceService extends BaseService implements IDataSourceService
{



    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function getDataSources()
    {

        $dataSourceService = new DataInitializationService($this->session);

        return $dataSourceService->getDataSources();
    }

    public function getDataSourcesSortedByField($field)
    {

        $dataSources = $this->getDataSources();

        foreach ($dataSources as $key => $value) {

            $taskList = $value->getDataList();

            $difficultyArr  = array_column($taskList, $field);

            array_multisort($difficultyArr, SORT_DESC, $taskList);
        }

        return $dataSources;
    }

    public function resetAllTasks()
    {

        $dataSources = $this->getDataSources();

        foreach ($dataSources as $skey => $svalue) {

            foreach ($svalue->getDataList() as $tkey => $task) {

                $task->setAssigned(false);
            }
        }
    }
}
