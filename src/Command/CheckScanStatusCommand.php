<?php

namespace App\Command;

use App\Service\DebrickedService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckScanStatusCommand extends Command
{
    protected static $defaultName = 'app:check-scan-status';

    public function __construct(
        private DebrickedService $debrickedService,
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Loop through scans, check status, apply rules, and notify
        return Command::SUCCESS;
    }
}
