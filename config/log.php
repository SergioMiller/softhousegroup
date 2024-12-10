<?php
declare(strict_types=1);

use App\Services\Log\Channels\DatabaseLogChannel;
use App\Services\Log\Channels\EmailLogChannel;
use App\Services\Log\Channels\FileLogChannel;

return [
    'default' => 'email',
    'channels' => [
        'file' => FileLogChannel::class,
        'email' => EmailLogChannel::class,
        'database' => DatabaseLogChannel::class
    ]
];
