<?php

declare(strict_types=1);


namespace App\Entity;


class ProposalCreationTask implements TaskInterface
{
    public function getTime(): int
    {
        return 50;
    }

    public function getName(): string
    {
        return "proposal creation";
    }

    public function getDescription(): string
    {
        return "even more important";
    }

}
