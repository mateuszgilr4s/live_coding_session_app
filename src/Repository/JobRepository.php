<?php

declare(strict_types=1);


namespace App\Repository;


use App\Entity\AnalyseAgreementTask;
use App\Entity\CompositeJob;
use App\Entity\Job;
use App\Entity\JobInterface;
use App\Entity\ProposalCreationTask;

class JobRepository
{
    public function getJob(): JobInterface
    {

        $allJob = new Job(
            1,
            [
                new ProposalCreationTask(),
                new AnalyseAgreementTask()
            ]
        );

        $propCrJob = new Job(
            2,
            [
                new ProposalCreationTask()
            ]
        );

        $compositeA = new CompositeJob(
            3, [
                $allJob
            ]
        );

        $compositeB = new CompositeJob(
            4,
            [
                $propCrJob,
                $compositeA
            ]
        );

        $compositeC = new CompositeJob(
            5,
            [
                $compositeB,
                $propCrJob
            ]
        );

        $compositeA->addJob($compositeC);

        return $compositeC;
    }
}
