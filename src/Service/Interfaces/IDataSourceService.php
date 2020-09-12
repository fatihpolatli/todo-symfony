<?php
namespace App\Service\Interfaces;

use App\Service\Interfaces\BaseInterface;

interface IDataSourceService extends BaseInterface
{
    public function getDataSources();

    public function getDataSourcesSortedByField($field);

    public function resetAllTasks();
}
