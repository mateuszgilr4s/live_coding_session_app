<?php

declare(strict_types=1);


namespace App\Controller;

use App\Entity\AnalyseAgreementTask;
use App\Entity\CompositeJob;
use App\Entity\Job;
use App\Entity\ProposalCreationTask;
use App\Factory\JobTimeCalculatorFactory;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class AppController
{

    public function __construct(
        private JobRepository $jobRepository,
        private JobTimeCalculatorFactory  $calculatorFactory
    ){}


    #[Route(path: "/")]
    public function index(): Response
    {
        $job = $this->jobRepository->getJob();
        $calculator = $this->calculatorFactory->createCalculator();
        $time = $calculator->calculateTime($job);

        return new Response("$time");
    }
}
