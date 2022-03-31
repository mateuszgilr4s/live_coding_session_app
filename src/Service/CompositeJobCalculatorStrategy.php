<?php

declare(strict_types=1);


namespace App\Service;


use App\Entity\CompositeJob;
use App\Entity\JobInterface;

class CompositeJobCalculatorStrategy implements JobCalculatorStrategyInterface
{
    private JobTimeCalculator $jobTimeCalculator;


    public function __construct(JobTimeCalculator $jobTimeCalculator)
    {
        $this->jobTimeCalculator = $jobTimeCalculator;
    }


    public function supports(JobInterface $job): bool
    {
        return $job::class === CompositeJob::class;
    }

    public function calculateTime(JobInterface|CompositeJob $job): int
    {
        $time = 0;
        foreach ($job->getJobs() as $job) {
            $time += $this->jobTimeCalculator->calculateTime($job);
        }

        return $time;
    }

}
