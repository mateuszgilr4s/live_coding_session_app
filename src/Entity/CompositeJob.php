<?php

declare(strict_types=1);


namespace App\Entity;


class CompositeJob implements JobInterface
{
    private int $id;
    private array $jobs;


    public function __construct(int $id, array $jobs)
    {
        $this->id = $id;
        $this->jobs = $jobs;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getJobs(): array
    {
        return $this->jobs;
    }

    public function addJob(JobInterface $job): void
    {
        $this->jobs[] = $job;
    }
}
