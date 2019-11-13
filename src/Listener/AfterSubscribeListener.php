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

namespace Hyperf\Nats\Listener;

use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Nats\Event\AfterSubscribe;

class AfterSubscribeListener implements ListenerInterface
{
    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(StdoutLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function listen(): array
    {
        return [
            AfterSubscribe::class,
        ];
    }

    /**
     * @param AfterSubscribe $event
     */
    public function process(object $event)
    {
        $this->logger->warning(sprintf(
            'NatsConsumer[%s] subscribe timeout. Try again after 1 ms.',
            $event->getConsumer()->getName()
        ));
    }
}
