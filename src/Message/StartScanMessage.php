<?php

namespace App\Message;

class StartScanMessage
{
    public function __construct(private int $uploadId) {}

    public function getUploadId(): int
    {
        return $this->uploadId;
    }
}

