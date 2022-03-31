<?php

declare(strict_types=1);


namespace App\Service;


use App\Entity\JobInterface;

class JobTimeCalculator
{
    private iterable $strategies;

    public function addStrategies(iterable $strategies)
    {
        $this->strategies = $strategies;
    }

    public function calculateTime(JobInterface $job): int
    {
        foreach ($this->strategies as $strategy) {
            if($strategy->supports($job)) {
               return $strategy->calculateTime($job);
            }
        }
    }
}
