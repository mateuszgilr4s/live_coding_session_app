<?php


namespace App\Entity;


interface TaskInterface
{
    public function getTime(): int;

    public function getName(): string;

    public function getDescription(): string;
}
