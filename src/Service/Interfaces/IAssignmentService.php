<?php
namespace App\Service\Interfaces;


use App\Dto\AssignmentDto;
use App\Dto\DeveloperDto;
use App\Service\Interfaces\BaseInterface;

interface IAssignmentService extends BaseInterface
{

    public function getAssignments();

    public function addToAssignments(AssignmentDto $assignment);

    public function getAssignmentByDeveloper(DeveloperDto $developer): AssignmentDto;

    public function getAverageManDayForAllTasks(): int;

    public function assignForDeveloper(DeveloperDto $developer, int $averageManDay);

    public function calculateAssignments();

    public function resetAssignments();

    public function getEstimatedTime();
}
