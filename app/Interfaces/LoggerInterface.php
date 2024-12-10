<?php
declare(strict_types=1);

namespace App\Interfaces;

interface LoggerInterface
{
    /**
     * Sends message to current logger.
     *
     * @param string $message
     */
    public function send(string $message): void;

    /**
     * Sends message by selected logger.
     *
     * @param string $message
     * @param string $loggerType
     */
    public function sendByLogger(string $message, string $loggerType): void;

    /**
     * Gets current logger type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Sets current logger type.
     *
     * @param string $type
     */
    public function setType(string $type): self;
}
