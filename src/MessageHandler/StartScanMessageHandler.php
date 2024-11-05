<?php
namespace App\MessageHandler;

use App\Message\StartScanMessage;
use App\Service\DebrickedService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class StartScanMessageHandler implements MessageHandlerInterface
{
    private DebrickedService $debrickedService;
    private EntityManagerInterface $entityManager;

    public function __construct(DebrickedService $debrickedService, EntityManagerInterface $entityManager)
    {
        $this->debrickedService = $debrickedService;
        $this->entityManager = $entityManager;
    }

    public function __invoke(StartScanMessage $message)
    {
        $uploadId = $message->getUploadId();
        // Fetch upload and start the scan using DebrickedService
        // Check vulnerabilities and notify based on rule
    }
}
