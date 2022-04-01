<?php

declare(strict_types=1);

namespace App\Command;

use App\Factory\JobTimeCalculatorFactory;
use App\Repository\JobRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CalculateTimeCommand extends Command
{

    public function __construct(
        private JobRepository $jobRepository,
        private JobTimeCalculatorFactory  $calculatorFactory
    ){
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:test');

    }


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $job = $this->jobRepository->getJob();
        $calculator = $this->calculatorFactory->createCalculator();
        $time = $calculator->calculateTime($job);

        echo $time;

        return 0;
    }


}
