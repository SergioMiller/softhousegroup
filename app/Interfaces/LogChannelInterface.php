<?php
declare(strict_types=1);

namespace App\Interfaces;

interface LogChannelInterface
{
    public function send(string $message): void;
}
