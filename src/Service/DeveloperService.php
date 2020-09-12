<?php

namespace App\Service;

use App\Service\BaseService;
use App\Service\Interfaces\IDeveloperService;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DeveloperService extends BaseService implements IDeveloperService
{

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function getDevelopers()
    {
        $dataInitializationServivce = new DataInitializationService($this->session);

        return  $dataInitializationServivce->getDevelopers($this->session);
    }

    public function getDevelopersSortedByField($field)
    {   


        $developers =  $this->getDevelopers();

        $difficultyArr  = array_column($developers, $field);

        array_multisort($difficultyArr, SORT_DESC, $developers);

        return $developers;
    }
}
