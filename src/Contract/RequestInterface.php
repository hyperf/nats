<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Hyperf\Nats\Contract;

use Closure;
use Hyperf\Nats\Message;

interface RequestInterface
{
    public function request(string $subject, $payload, Closure $callback);

    public function requestSync(string $subject, $payload): Message;
}
