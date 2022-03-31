<?php

declare(strict_types=1);


namespace App\Entity;


class AnalyseAgreementTask implements TaskInterface
{

    public function getTime(): int
    {
        return 10;
    }

    public function getName(): string
    {
        return "analyse agreement";
    }

    public function getDescription(): string
    {
        return "very important task";
    }


}
