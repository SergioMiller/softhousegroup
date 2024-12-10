<?php
declare(strict_types=1);

namespace App\Services\Log\Channels;

use App\Interfaces\LogChannelInterface;

class DatabaseLogChannel implements LogChannelInterface
{
    public function send(string $message): void
    {
        echo $message . ': was send via ' . __CLASS__ . '<br>';
    }
}
