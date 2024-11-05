<?php

namespace App\Service;

use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Notifier\Message\EmailMessage;

class NotificationService
{
    private NotifierInterface $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public function sendSlackNotification(string $message): void
    {
        $chatMessage = (new ChatMessage($message))->transport('slack');
        $this->notifier->send($chatMessage);
    }

    public function sendEmailNotification(string $to, string $subject, string $body): void
    {
        $emailMessage = (new EmailMessage())
            ->to($to)
            ->subject($subject)
            ->text($body);
        $this->notifier->send($emailMessage);
    }
}
