<?php

namespace App\Service;

use App\Dto\DeveloperDto;
use App\Dto\TaskDataSourceDto;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DataInitializationService extends BaseService
{

    public static string $DEVELOPERS_KEY = "developers";

    public static string $DATASOURCES_KEY = "datasources";

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }


    public function initDataSources()
    {

        $data = array();



        $s1 = new TaskDataSourceDto();

        $s1->setUrl("http://www.mocky.io/v2/5d47f24c330000623fa3ebfa");
        $s1->setDifficultyFieldName("zorluk");
        $s1->setTimeFieldName("sure");
        $s1->setNameFieldName("id");

        $c1 = new TaskDataSourceCreator($s1);

        array_push($data, $c1);



        $s2 = new TaskDataSourceDto();

        $s2->setUrl("http://www.mocky.io/v2/5d47f235330000623fa3ebf7");
        $s2->setDifficultyFieldName("level");
        $s2->setTimeFieldName("estimated_duration");
        $s2->setPathName("Business Task ");
        $s2->setPathIncrement(true);

        $c2 = new TaskDataSourceCreator($s2);


        array_push($data, $c2);

        $this->setData(DataInitializationService::$DATASOURCES_KEY, $data);
    }

    public function initDevelopers()
    {

        $d1 = $this->getDeveloperInstance(1, 1);
        $d2 = $this->getDeveloperInstance(1, 2);
        $d3 = $this->getDeveloperInstance(1, 3);
        $d4 = $this->getDeveloperInstance(1, 4);
        $d5 = $this->getDeveloperInstance(1, 5);

        $data = array($d1, $d2, $d3, $d4, $d5);


        $this->setData(DataInitializationService::$DEVELOPERS_KEY, $data);
    }

    public function getDeveloperInstance(int $time, int $difficulty): DeveloperDto
    {

        $d = new DeveloperDto();

        $d->setTime($time);
        $d->setDifficulty($difficulty);
        $d->setManDay($time * $difficulty);

        return $d;
    }

    private function setData(string $field, $data)
    {

        $this->session->set($field, $data);
    }

    public function getDevelopers()
    {

        return $this->session->get(DataInitializationService::$DEVELOPERS_KEY);
    }

    public function getDataSources()
    {

        return $this->session->get(DataInitializationService::$DATASOURCES_KEY);
    }
}
