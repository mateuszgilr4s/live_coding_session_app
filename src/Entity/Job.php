<?php

declare(strict_types=1);


namespace App\Entity;


class Job implements JobInterface
{
    private int $id;

    /**
     * @var TaskInterface[]
     */
    private array $tasks;

    public function __construct($id, array $tasks)
    {
        $this->id = $id;
        $this->tasks = $tasks;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return TaskInterface[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }


}
