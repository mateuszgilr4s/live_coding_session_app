<?php

declare(strict_types=1);


namespace App\Factory;


use App\Service\CompositeJobCalculatorStrategy;
use App\Service\JobTimeCalculator;
use App\Service\SimpleJobCalculatorStrategy;

class JobTimeCalculatorFactory
{
    public function createCalculator(): JobTimeCalculator
    {
        $calculator = new JobTimeCalculator();

        $calculator->addStrategies([
            new SimpleJobCalculatorStrategy(),
            new CompositeJobCalculatorStrategy($calculator)
        ]);

        return $calculator;
    }
}
