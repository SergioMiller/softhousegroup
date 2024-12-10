<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\LoggerInterface;
use Illuminate\Support\Str;

final class LogController extends Controller
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function log(): void
    {
        $this->logger->send(Str::uuid()->toString());
    }

    /**
     * Sends a log message to a special logger.
     *
     * @param string $type
     */
    public function logTo(string $type): void
    {
        $this->logger->setType($type)->send(Str::uuid()->toString());
    }

    /**
     * Sends a log message to all loggers.
     */
    public function logToAll(): void
    {
        foreach (config('log.channels') as $type => $channel) {
            $this->logger->setType($type)->send(Str::uuid()->toString());
        }
    }
}
