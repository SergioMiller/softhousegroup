<?php
declare(strict_types=1);

namespace App\Services\Log;

use App\Interfaces\LogChannelInterface;
use App\Interfaces\LoggerInterface;
use LogicException;

class LoggerFactory implements LoggerInterface
{
    private string $type;

    private LogChannelInterface $chanel;

    public function __construct()
    {
        $this->type = config('log.default');
        $this->setChanel($this->type);
    }

    public function send(string $message): void
    {
        $this->chanel->send($message);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->setType($loggerType);
        $this->send($message);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        $this->setChanel($this->type);

        return $this;
    }

    private function setChanel(string $type): void
    {
        $chanel = config("log.channels.$type");

        if (null === $chanel) {
            throw new LogicException('Log chanel not found.');
        }

        $this->chanel = new $chanel;
    }
}
