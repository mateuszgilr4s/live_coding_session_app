<?php

declare(strict_types=1);


namespace App\Service;


use App\Entity\Job;
use App\Entity\JobInterface;

class SimpleJobCalculatorStrategy implements JobCalculatorStrategyInterface
{

    public function supports(JobInterface $job): bool
    {
        return get_class($job) === Job::class;
    }


    public function calculateTime(JobInterface|Job $job): int
    {
        $time = 0;

        foreach ($job->getTasks() as $task) {
            $time += $task->getTime();
        }

        return $time;
    }
}
